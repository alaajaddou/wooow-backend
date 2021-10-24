<?php
if (! function_exists('resource')) {
    /**
     * Generate an resource path for the application.
     *
     * @param  string  $path
     * @param  bool|null  $secure
     * @return string
     */
    function resource($path, $secure = null)
    {
        return app('url')->asset('../resources/' . $path, $secure);
    }
}
