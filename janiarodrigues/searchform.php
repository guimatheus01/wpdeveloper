<div class="search-block" style="border-color:<?php print esc_attr( floris_get_option('border_color') ); ?>">
    <div class="close-popup"><span></span></div>
    <div class="table-align">
        <div class="cell-view">
            <form action="<?php print esc_url(home_url('/')); ?>" method="GET" id="searchform">
                <div class="container-menu">
                    <div class="input-field">
                        <input type="hidden" name="post_type" value="product">
                        <input type="text" required placeholder="<?php esc_html_e( 'PESQUISAR','floris' ); ?>" name="s">
                        <span class="clear-input"><img src="<?php print esc_url( get_template_directory_uri().'/assets/img/close.png' ); ?>" alt=""></span>
                    </div>
                </div> 
            </form> 
        </div>
    </div>
</div>