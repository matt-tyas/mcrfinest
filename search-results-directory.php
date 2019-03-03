<?php
/**
 * The template for displaying Archive pages.
 *
 * Used to display archive-type pages if nothing more specific matches a query.
 * For example, puts together date-based pages if no date.php file exists.
 *
 * If you'd like to further customize these archive views, you may create a
 * new template file for each specific one. For example, Twenty Twelve already
 * has tag.php for Tag archives, category.php for Category archives, and
 * author.php for Author archives.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */
 get_header(); ?>
 <?php if (function_exists('dimox_breadcrumbs')) dimox_breadcrumbs(); ?>
 <div class="gw row">
      <div class="g one-third palm-one-whole">
           <h1><?php single_cat_title(); ?></h1>
      </div>
 </div>
 <div class="gw row">
       <div class="g one-third palm-one-whole">
          <?php echo do_shortcode('[searchandfilter id="74989"]'); ?>
       </div>
       <div class="g two-thirds palm-one-whole">
          <div class="gw equal">
               <section class="latest-articles mf-directory-articles" id="ajax-search">

               </section>
          </div>
          <?php wp_pagenavi(); ?>
     </div>
 </div>
 <?php get_footer(); ?>
