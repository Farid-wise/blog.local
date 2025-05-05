<?php


interface IView
{
    public function render(): string;
}

const VIEW_PATH = '../views';

/**
 * connects view parts as solid one
 *
 * @param string $viewFile
 * @param array $data
 * @return false|string|IView
 */


function view(string $viewFile, array $data = []): false|string|IView
{

    global $blog_options;
    try {
        [$folder, $file] = explode('->', $viewFile);

        if (!is_dir(VIEW_PATH . "/$folder")) {
            throw new \RuntimeException("Such folder not found: $folder");
        }


        if (!file_exists(VIEW_PATH . "/$folder/$file.php")) {
            throw new \RuntimeException("Such view file not found: $file");
        }


        // Извлекаем данные для использования в представлении
        extract($data);

        // Начинаем буферизацию вывода
        ob_start();


        require VIEW_PATH . "/$folder/$file.php";


        // Возвращаем содержимое представления
        return new class() implements IView {
            public function __toString(): string
            {
                return $this->render();
            }

            public function render(): string
            {
                // Получаем содержимое буфера вывода

                return ob_get_clean();
            }
        };
    } catch (Exception $e) {
        echo $e->getMessage();
        return '';
    }
}