<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [ContatosController::class, 'index'])->name('home');
Route::get('contatos/create', [ContatosController::class, 'create'])->name('contatos.create');
Route::post('contatos', [ContatosController::class, 'store'])->name('contatos.store');
Route::get('contatos/{contato}', [ContatosController::class, 'show'])->name('contatos.show');
Route::get('contatos/{contato}/edit', [ContatosController::class, 'edit'])->name('contatos.edit');
Route::put('contatos/{contato}', [ContatosController::class, 'update'])->name('contatos.update');
Route::delete('contatos/{contato}', [ContatosController::class, 'destroy'])->name('contatos.destroy');