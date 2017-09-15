<?php
/**
 * this is the default block template
 * Class td_block_header_16
 */
class td_block_template_16 extends td_block_template {



    /**
     * renders the CSS for each block, each template may require a different css generated by the theme
     * @return string CSS the rendered css and <style> block
     */
    function get_css() {


        // $unique_block_class - the unique class that is on the block. use this to target the specific instance via css
        $unique_block_class =  $this->get_unique_block_class();

        // the css that will be compiled by the block, <style> - will be removed by the compiler
        $raw_css = "
        <style>
            /* @header_text_color */
            .$unique_block_class .td-block-title > * {
                color: @header_text_color !important;
            }


            /* @border_color */
            .$unique_block_class .td-block-title:before,
            .$unique_block_class .td-block-title:after {
                background-color: @border_color !important;
            }

            /* @accent_text_color */
            .$unique_block_class .td_module_wrap:hover .entry-title a,
            .$unique_block_class .td-pulldown-filter-link:hover,
            .$unique_block_class .td-subcat-item a:hover,
            .$unique_block_class .td-cur-simple-item,
            .$unique_block_class .td_quote_on_blocks,
            .$unique_block_class .td-opacity-cat .td-post-category:hover,
            .$unique_block_class .td-opacity-read .td-read-more a:hover,
            .$unique_block_class .td-opacity-author .td-post-author-name a:hover,
            .$unique_block_class .td-instagram-user a,
            .$unique_block_class .td-subcat-dropdown:hover .td-subcat-more span,
            .$unique_block_class .td-subcat-dropdown:hover .td-subcat-more i {
                color: @accent_text_color !important;
            }

            .$unique_block_class .td-next-prev-wrap a:hover,
            .$unique_block_class .td-load-more-wrap a:hover {
                background-color: @accent_text_color !important;
                border-color: @accent_text_color !important;
            }

            .$unique_block_class .td-read-more a,
            .$unique_block_class .td-weather-information:before,
            .$unique_block_class .td-weather-week:before,
            .$unique_block_class .td-exchange-header:before,
            .td-footer-wrapper .$unique_block_class .td-post-category,
            .$unique_block_class .td-post-category:hover,
            .$unique_block_class .td-subcat-dropdown ul:after {
                background-color: @accent_text_color !important;
            }
        </style>
    ";

        $td_css_compiler = new td_css_compiler($raw_css);
        $td_css_compiler->load_setting_raw('header_text_color', $this->get_att('header_text_color'));
        $td_css_compiler->load_setting_raw('border_color', $this->get_att('border_color'));
        $td_css_compiler->load_setting_raw('accent_text_color', $this->get_att('accent_text_color'));

        $compiled_style = $td_css_compiler->compile_css();


        return $compiled_style;
    }


    /**
     * renders the block title
     * @return string HTML
     */
    function get_block_title() {

        $custom_title = $this->get_att('custom_title');
        $custom_url = $this->get_att('custom_url');



        if (empty($custom_title)) {
            $td_pull_down_items = $this->get_td_pull_down_items();
            if (empty($td_pull_down_items)) {
                //no title selected and we don't have pulldown items
                return '';
            }
            // we don't have a title selected BUT we have pull down items! we cannot render pulldown items without a block title
            $custom_title = 'Block title';
        }


        // there is a custom title
        $buffy = '';
        $buffy .= '<h4 class="td-block-title">';
        if (!empty($custom_url)) {
            $buffy .= '<a href="' . esc_url($custom_url) . '" class="td-pulldown-size">' . esc_html($custom_title) . '</a>';
        } else {
            $buffy .= '<span class="td-pulldown-size">' . esc_html($custom_title) . '</span>';
        }
        $buffy .= '</h4>';
        return $buffy;
    }


    /**
     * renders the filter of the block
     * @return string
     */
    function get_pull_down_filter() {
        $buffy = '';

        $td_pull_down_items = $this->get_td_pull_down_items();
        if (empty($td_pull_down_items)) {
            return '';
        }

        //generate unique id for this pull down filter control
        $pull_down_wrapper_id = "td_pulldown_" . $this->get_block_uid();

        // wrapper
        $buffy .= '<div class="td-pulldown-syle-3 td-subcat-filter" id="' . $pull_down_wrapper_id . '">';

            // subcategory list
            $buffy .= '<ul class="td-subcat-list" id="' . $pull_down_wrapper_id . '_list">';
            foreach ($td_pull_down_items as $item) {
                $buffy .= '<li class="td-subcat-item"><a class="td-subcat-link" id="' . td_global::td_generate_unique_id() . '" data-td_filter_value="' . $item['id'] . '" data-td_block_id="' . $this->get_block_uid() . '" href="#">' . $item['name'] . '</a></li>';
            }
            $buffy .= '</ul>';


            // subcategory dropdown list
            $buffy .= '<div class="td-subcat-dropdown">';
            $buffy .= '<div class="td-subcat-more" aria-haspopup="true"><span>' . __td('More', TD_THEME_NAME) . '</span><i class="td-icon-read-down"></i></div>';

            // the dropdown list
            $buffy .= '<ul class="td-pulldown-filter-list">';
            $buffy .= '</ul>';

            $buffy .= '</div>';
        $buffy .= '</div>';

        return $buffy;
    }
}