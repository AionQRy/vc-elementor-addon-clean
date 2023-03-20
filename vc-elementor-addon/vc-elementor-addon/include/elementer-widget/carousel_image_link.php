<?php

namespace Elementor;

class carousel_image_link extends Widget_Base
{

  public function get_name()
  {
    return 'carousel_image_link';
  }

  public function get_title()
  {
    return __('VC Image Carousel');
  }

  public function get_icon()
  {
    return 'eicon-slides';
  }

  public function __construct($data = [], $args = null)
  {
    parent::__construct($data, $args);

    // wp_enqueue_style( 'carousel_image_link_style', plugin_dir_url( __DIR__  ) . 'css/carousel_image_link.css','1.1.0');
  }

  public function get_style_depends() {
    wp_register_style( 'carousel_image_link_style', plugin_dir_url( __DIR__  ) . 'css/carousel_image_link.css','1.1.0');
    return [ 'carousel_image_link_style' ];
  }




  public function get_categories()
  {
    return ['general'];
  }

  protected function register_controls()
  {

    $this->start_controls_section(
      'content_section',
      [
        'label' => __( 'Content', 'yp-core' ),
        'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
      ]
    );

        $repeater = new \Elementor\Repeater();



    $repeater->add_control(
    'image_slide',
    [
      'label' => esc_html__( 'Choose Image', 'yp-core' ),
      'type' => \Elementor\Controls_Manager::MEDIA,
      'default' => [
        'url' => \Elementor\Utils::get_placeholder_image_src(),
      ],
    ]
  );

  $repeater->add_control(
    'image_link', [
    'label' => esc_html__( 'Link', 'yp-core' ),
    'type' => \Elementor\Controls_Manager::TEXT,
    'default' => "#",
    'label_block' => true,
    ]
    );


  $this->add_control(
    'slide_list',
    [
      'label' => esc_html__( 'Slide Carousel', 'yp-core' ),
      'type' => \Elementor\Controls_Manager::REPEATER,
      'fields' => $repeater->get_controls(),
      'default' => [
        // [
        //   'image_slide' => '',
        // ],
        [
          'image_link' => esc_html__( '#', 'yp-core' ),
        ],
      ],
      // 'title_field' => '{{{ list_title }}}',
    ]
  );




        $this->add_responsive_control(
          'column',
          [
            'type' => \Elementor\Controls_Manager::TEXT,
            'label' => esc_html__( 'Column', 'yp-core' ),

            'devices' => [ 'desktop', 'tablet', 'mobile' ],
            'desktop_default' => 1,
            'tablet_default' => 1,
            'mobile_default' => 1,
          ]
        );



        $this->add_responsive_control(
			'space_between',
			[
				'type' => \Elementor\Controls_Manager::TEXT,
				'label' => esc_html__( 'Spacing', 'yp-core' ),
				// 'range' => [
				// 	'px' => [
				// 		'min' => 0,
				// 		'max' => 100,
				// 	],
				// ],
				'devices' => [ 'desktop', 'tablet', 'mobile' ],
				'desktop_default' => 0,
				'tablet_default' => 0,
				'mobile_default' => 0,
				// 'selectors' => [
				// 	'{{WRAPPER}} .widget-image' => 'margin-bottom: {{SIZE}}{{UNIT}};',
				// ],
			]
		);

        $this->add_control(
          'auto_play',
          [
            'label' => esc_html__( 'Autoplay', 'yp-core' ),
            'type' => \Elementor\Controls_Manager::SWITCHER,
            'label_on' => esc_html__( 'Yes', 'yp-core' ),
            'label_off' => esc_html__( 'No', 'yp-core' ),
            'return_value' => 'yes',
            'default' => 'no',
          ]
        );

        $this->add_control(
          'pagination',
          [
            'label' => esc_html__( 'Pagination', 'yp-core' ),
            'type' => \Elementor\Controls_Manager::SWITCHER,
            'label_on' => esc_html__( 'Show', 'yp-core' ),
            'label_off' => esc_html__( 'Hide', 'yp-core' ),
            'return_value' => 'yes',
            'default' => 'yes',
          ]
        );
        $this->add_control(
          'pagination_position',
          [
            'label' => esc_html__( 'Pagination Position', 'yp-core' ),
            'type' => \Elementor\Controls_Manager::SELECT,
            'default' => 'outside_pagination',
            'options' => [
              'outside_pagination' => esc_html__( 'Outside', 'yp-core' ),
              'inside_pagination'  => esc_html__( 'Inside', 'yp-core' ),
            ],
          ]
        );

        $this->add_control(
          'pagination_number',
          [
            'label' => esc_html__( 'Pagination Number', 'yp-core' ),
            'type' => \Elementor\Controls_Manager::SWITCHER,
            'label_on' => esc_html__( 'Show', 'yp-core' ),
            'label_off' => esc_html__( 'Hide', 'yp-core' ),
            'return_value' => 'yes',
            'default' => 'no',
          ]
        );


        $this->add_control(
          'center_mode',
          [
            'label' => esc_html__( 'Center Mode', 'yp-core' ),
            'type' => \Elementor\Controls_Manager::SWITCHER,
            'label_on' => esc_html__( 'Yes', 'yp-core' ),
            'label_off' => esc_html__( 'No', 'yp-core' ),
            'return_value' => 'yes',
            'default' => 'no',
          ]
        );

        $this->add_control(
          'arrow',
          [
            'label' => esc_html__( 'Arrow', 'yp-core' ),
            'type' => \Elementor\Controls_Manager::SWITCHER,
            'label_on' => esc_html__( 'Show', 'yp-core' ),
            'label_off' => esc_html__( 'Hide', 'yp-core' ),
            'return_value' => 'yes',
            'default' => 'yes',
          ]
        );


        $this->add_control(
          'arrow_position',
          [
            'label' => esc_html__( 'Arrow Position', 'yp-core' ),
            'type' => \Elementor\Controls_Manager::SELECT,
            'default' => 'outside_arrow',
            'options' => [
              'outside_arrow' => esc_html__( 'Outside', 'yp-core' ),
              'inside_arrow'  => esc_html__( 'Inside', 'yp-core' ),
            ],
          ]
        );


  }

  protected function render()
  {
    $settings = $this->get_settings_for_display();
    $column_desktop = $settings['column'];
    $column_tablet = $settings['column_tablet'];
    $column_mobile = $settings['column_mobile'];
    $autoplay = $settings['auto_play'];
    $pagination_number = $settings['pagination_number'];
    $slide_list = $settings['slide_list'];
    $space_between_desktop = $settings['space_between'];
    $space_between_tablet = $settings['space_between_tablet'];
    $space_between_mobile = $settings['space_between_mobile'];
    ob_start();
    if (class_exists('ACF')) {
    	$setting_theme = get_field('setting_theme', 'option');
    }
    $widget_id = $this->get_id();
?>
    <?php if ($_GET['action'] == '') : ?>

      <div id="carousel_image_link" class="swiper carousel_image_link id-<?php echo $widget_id; ?> <?php echo $settings['arrow_position']; ?> <?php echo $settings['pagination_position']; ?>">
        <div class="swiper-wrapper">
          <?php foreach ($slide_list as  $value):
            $image_slide = $value['image_slide'];
            $image_link = $value['image_link'];
            ?>
            <div class="swiper-slide">
              <div class="text-center">
              <?php if ($setting_theme == 'twelve'): ?>
                <a href="<?php echo $image_link; ?>" title="<?php echo $image_slide['alt']; ?>" class="overlay_theme_3">
                  <div class="in-overlay"></div>
                  <div class="svg-overlay">
                    <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>
                  </div>
              			<img src="<?php echo $image_slide['url']; ?>" alt="<?php echo $image_slide['alt']; ?>">
              		</a>
                <?php else: ?>
                  <a href="<?php echo $image_link; ?>">
                    <img class="thumbnail-content" src="<?php echo $image_slide['url']; ?>" alt="<?php echo $image_slide['alt']; ?>">
                  </a>
              <?php endif; ?>
              </div>
            </div>
          <?php endforeach; ?>
        </div>
        <div class="swiper-button-prev vc-swiper-button">
          <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1">
            <polyline points="15 18 9 12 15 6"></polyline>
          </svg>
        </div>
        <div class="swiper-button-next vc-swiper-button">
          <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1">
            <polyline points="9 18 15 12 9 6"></polyline>
          </svg>
        </div>
        <div class="swiper-pagination"></div>
      </div>

      <style media="screen">
      <?php if ($settings['arrow'] != 'yes'): ?>
        .carousel_image_link.id-<?php echo $widget_id; ?>.outside_arrow .swiper-button-next,
        .carousel_image_link.id-<?php echo $widget_id; ?>.outside_arrow .swiper-button-prev{
          display: none;
        }
        .carousel_image_link.id-<?php echo $widget_id; ?>.outside_arrow {
            width: 100%;
        }
      <?php endif; ?>
      </style>

      <script type="module">
      var swiper = new Swiper(".carousel_image_link.id-<?php echo $widget_id; ?>", {
        slidesPerView: <?php echo $column_desktop; ?>,

        <?php if ($settings['center_mode'] != 'yes'): ?>
        slidesPerGroup: <?php echo $column_desktop; ?>,
       <?php endif; ?>

        spaceBetween: <?php echo $space_between_desktop; ?>,
        <?php if ($autoplay == 'yes'): ?>
          autoplay: {
           delay: 3000,
         },
        <?php endif; ?>

        <?php if($settings['center_mode']  == 'yes'): ?>
              centeredSlides: true,
        <?php endif; ?>

        loop: true,


        <?php if ($settings['pagination'] == 'yes'): ?>
        pagination: {
          el: ".id-<?php echo $widget_id; ?> .swiper-pagination",
          clickable: true,
          <?php if ($pagination_number == 'yes') {
            echo 'type: "fraction"';
          } ?>
        },
        <?php endif; ?>
        autoHeight: true,
        <?php if ($settings['arrow'] == 'yes'): ?>
        navigation: {
          nextEl: ".id-<?php echo $widget_id; ?> .swiper-button-next",
          prevEl: ".id-<?php echo $widget_id; ?> .swiper-button-prev",
        },

        <?php endif; ?>
        breakpoints: {
           320: {
             slidesPerView: <?php echo $column_mobile; ?>,
             slidesPerGroup: <?php echo $column_mobile; ?>,
             spaceBetween: <?php echo $space_between_mobile; ?>,
           },
           768: {
             slidesPerView: <?php echo $column_tablet; ?>,
             slidesPerGroup: <?php echo $column_tablet; ?>,
             spaceBetween: <?php echo $space_between_tablet; ?>,
           },
           1024: {
             slidesPerView: <?php echo $column_desktop; ?>,
             <?php if ($settings['center_mode'] != 'yes'): ?>
             slidesPerGroup: <?php echo $column_desktop; ?>,
            <?php endif; ?>
             spaceBetween: <?php echo $space_between_desktop; ?>,
           },
         },
      });
      </script>
    <?php else : ?>
      <img src="<?php echo plugin_dir_url(__DIR__) . 'image/thumb.jpg'; ?>" alt="thumb">
    <?php endif; ?>

  <?php

    $output_string = ob_get_contents();
    ob_end_clean();
    echo $output_string;
  }

  protected function _content_template()
  {
    ob_start();
  ?>
    <img src="<?php echo plugin_dir_url(__DIR__) . 'image/thumb.jpg'; ?>" alt="thumb">
<?php
    $output_string = ob_get_contents();
    ob_end_clean();
    echo $output_string;
  }
}
