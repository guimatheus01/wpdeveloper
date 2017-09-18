<?php /* Template Name: Guia */  get_header(); ?> 
        <!--// SubHeader \\-->
        <div class="environment-subheader">
            <span class="subheader-transparent"></span>
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h1>Guia da Indústria</h1>
                    </div>
                    <div class="col-md-12">
                        <ul class="environment-breadcrumb">
                            <li><a href="<?php echo(home_url()); ?>">Home</a></li>
                            <li>Guia da Indústria</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!--// SubHeader \\-->

        <!--// Main Content \\-->
        <div class="environment-main-content">

            <!--// Main Section \\-->
            <div class="environment-main-section">
                <div class="container">
                    <div class="row">
                        
                        <div class="col-md-9">
                            <div class="environment-cause environment-cause-list">
                                <div class="col-md-12">
                                
                                   <!--  <?php echo do_shortcode('[search-into-subcategories parent_category=7 max_depth=2 search_input=0 labels=Sindicato/Atividades|Categoria search_text=Filtrar hide_empty=0 show_date_ranges=0 custom_post_types=documents posts_per_page=10]'); ?> -->

<!--                                     <select name="event-dropdown" onchange='document.location.href=this.options[this.selectedIndex].value;'> 
    <option value=""><?php echo esc_attr(__('Selecione um Filtro')); ?></option> 
    <?php 
    $categories = get_categories('child_of=7&hide_empty=0'); 

    foreach ($categories as $category) {
       // var_dump($category);
        $option = '<option value="'.get_category_link($category->term_id).'">';
        $option .= $category->cat_name;
        $option .= ' ('.$category->category_count.')';
        $option .= '</option>';
        echo $option;
    }
    ?>
    </select>  -->

<!-- <?php 
$taxonomy = 'category';
$parents  = get_terms( $taxonomy, array( 'parent' => 7, "hide_empty" => 0 ) ); // Get all top level terms of a taxonomy
if ( $parents ) :
    ?>
    <select name="anatomy" id="name_cat">    
        <option value="">Atividades ou Sindicatos</option>
        <?php foreach ( $parents as $term ) { ?>
        <option value="<?php echo $term->slug; ?>" id="<?php echo $term->name; ?>"> <?php echo $term->name; ?></option>
         <?php } ?>
    </select>    

    <?php  $firstParent = $parents[0];  ?>
    <?php $states = get_term_children( $firstParent->term_id, $taxonomy ); ?>
    <select name="state" id="name_subcat">
        <option value="">Escolha a Categoria</option>
        <?php foreach ( $states as $child ) { 
            $term = get_term_by( 'id', $child, $taxonomy ); ?>
            <option value="<?php echo $term->slug; ?>"><?php echo $term->name; ?></option>
        <?php } ?>
    </select>
<?php endif;?> -->


<!-- <?php $args = array(
    'taxonomy'      => 'category',
    'post_type'     => 'industria', // filter by the post type 'project'
    'echo'          => true,
);
wp_dropdown_categories( $args ); ?> -->




                                </div>
                                <br>
                                <ul>
                                    <?php
                                        $args = array( 'post_type' => 'industria', 'orderby' => 'title',  'order' => 'asc', 'showposts' => -1);
                                        $loop = new WP_Query( $args );
                                        while ( $loop->have_posts() ) : $loop->the_post();
                                            $title_industria=get_post_meta(get_the_ID(), 'industria_cargo', true );
                                    ?>
                                     <li class="col-md-12">
                                        <div class="environment-cause-list-wrap">
                                           <?php if (has_post_thumbnail()): ?>
                                                <figure><a href="<?php the_permalink(); ?>"><img src="<?php echo the_post_thumbnail_url(); ?>" alt=""><i class="fa fa-eye"></i></a></figure>
                                           <?php endif ?>
                                            <section>
                                                <strong><?php echo $title_industria; ?></strong>
                                                <h5><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
                                                <p><?php the_content(); ?></p>
                                                <div class="environment-cause-donate">
                                                    <span class="color"><?php the_category();?></span>
                                                    <span><?php the_modified_date(); ?>   /</span>
                                                    <a href="<?php the_permalink(); ?>" class="environment-plan-btn">Ver Indústria</a>
                                                </div>
                                            </section>
                                        </div>
                                    </li>
                                    <?php endwhile; ?>

                                </ul>
                                <?php
                                  if ( function_exists('wp_bootstrap_pagination') )
                                    wp_bootstrap_pagination();
                                ?>
                            </div>

                            
                        </div>

                        <?php get_sidebar('right'); ?>

                    </div>
                </div>
            </div>
            <!--// Main Section \\-->
        </div>
        <!--// Main Content \\-->

<?php get_footer(); ?>