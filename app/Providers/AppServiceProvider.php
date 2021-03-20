<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
  /**
   * Register any application services.
   *
   * @return void
   */
  public function register()
  {
    //
  }

  /**
   * Bootstrap any application services.
   *
   * @return void
   */
  public function boot()
  {
    $this->app->bind(FusionAuthClient::class, function ($app) {
      return new FusionAuthClient(env('FUSIONAUTH_API_KEY'), env('FUSIONAUTH_BASE_URL'));
    });
  }
}
