<?php
use DaveJamesMiller\Breadcrumbs\Facades\Breadcrumbs;

// Home
Breadcrumbs::for('home', function ($trail) {
    $trail->push('Home', route('lists'));
});

// Home > Product Details
Breadcrumbs::for('product', function ($trail, $product) {
    $trail->parent('home');
    $trail->push($product->name, route('product.show', $product));
});

// Home > My Post
Breadcrumbs::for('mypost', function ($trail, $user) {
    $trail->parent('home');
    $trail->push($user->name, route('mypost.show', $user));
});

// Home > Profile
Breadcrumbs::for('profile', function ($trail, $user) {
    $trail->parent('home');
    $trail->push($user->name, route('profile', $user));
});