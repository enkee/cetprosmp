<!-- Original -->
<!-- <form role="search" method="get" action="<?php echo home_url('/'); ?>">
    <input type="search" class="form-control" placeholder="Search" value="<?php echo get_search_query(); ?>" name="s" title="Search">
    <input type="submit" class="search-submit" value="Buscar" />
</form> -->


<!-- Mi Personalizacion -->
<form role="search" method="get" action="<?php echo home_url('/'); ?>">
    <input type="search"  placeholder="Buscar &hellip;" value="<?php echo get_search_query(); ?>" name="s" title="Search"/>
    
    <input type="submit" value="Buscar" />
</form>
