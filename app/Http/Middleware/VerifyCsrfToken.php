<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;

class VerifyCsrfToken extends Middleware
{
    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array<int, string>
     */
    protected $except = [
        "http://localhost:8000/delete-client/*",
        "http://localhost:8000/delete-property/*",
        "http://localhost:8000/edit-client/*",
        "http://localhost:8000/register",
        "http://localhost:8000/edit-property/*",
        "http://localhost:8000/update-property/*",


    ];
}
