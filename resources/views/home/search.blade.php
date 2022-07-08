<?php
view()->share('pageTitle', __('Pesquisa'));
view()->share('hideToolbar', true);

?>

<x-base-layout>
   @include('home.search.select2')
    @include('home.search.plantas')

</x-base-layout>
