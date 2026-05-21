<?php

use Illuminate\Mail\Mailables\Content;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return "<main style= 'min-height: 100dvh; display: flex; justify-Content: center;
                    align-items: center'>
                    <h1 style= 'font-family: Arial; font-size: 2rem'>
                        ✅ Check API EndPoints in postman / ApiDog
                    </h1>
             </main>";        
});
