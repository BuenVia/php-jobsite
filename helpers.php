<?php

/**
 * Get the base path
 * 
 * @param string $path
 * @return string
 */
function basePath($path = '')
{
    return __DIR__ . '/' . $path;
}

/**
 * Load a view
 * 
 * @param string $name
 * @param array $data
 * @return void
 */
function loadView($name, $data = [])
{
    $viewPath = basePath("App/views/{$name}.view.php");
    
    // Make sure view path exists
    if (file_exists($viewPath)) {
        extract($data);
        require $viewPath;
    } else {
        echo "View '{$name}' not found";
    }
}

/**
 * Load a partial
 * 
 * @param string $name
 * @param string $data
 * @return void
 */
function loadPartial($name, $data = [])
{
    $viewPath = basePath("App/views/partials/{$name}.php");

    // Make sure view path exists
    if (file_exists($viewPath)) {
        extract($data);
        require $viewPath;
    } else {
        echo "Partial '{$name}' not found.";
    }
}

/**
 * Inspect a value
 * 
 * @param array $value
 * @return void
 */
function inspect($value)
{
    echo '<pre>';
    var_dump($value);
    echo '</pre>';
}

/**
 * Inspect a value and die
 * 
 * @param mixed $value
 * @return void
 */
function inspectAndDie($value)
{
    echo '<pre>';
    die(var_dump($value));
    echo '</pre>';
}

/**
 * Format salary
 * 
 * @param string $salary
 * @return string $formattedSalary
 */
function formatSalary($salary)
{
    return '$' . number_format(floatval($salary));
}