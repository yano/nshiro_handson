<?php

/**
 * @param $routeParams
 * @param string $label
 * @return string
 */

// 使い方
//
// https://laracasts.com/series/laravel-5-alpha-from-scratch/episodes/14
// bladeでこう
//{!! delete_form(['songs.destroy', $song->slug], 'Delete song!') !!}
// routeは Route::deleteで..

function delete_form($routeParams, $label = 'Delete'){

//    $form = Form::open(['route' => ['songs.destroy', $song->slug], 'method' => 'DELETE']);

    $form = Form::open(['route' => $routeParams, 'method' => 'DELETE']);
    $form .= Form::submit($label, ['class' => 'btn btn-danger']);
    $form .= Form::close();

    return $form;
}
