<?php

namespace  ContactApp;


use Illuminate\Support\ServiceProvider;

class ContactServiceProvider extends ServiceProvider
{
   
    public function boot()
    {
        
    }

   
    public function register()
    {
        $this->app->singleton('ContactApp', function() {
            return new ContactApp;
        });
    }
}