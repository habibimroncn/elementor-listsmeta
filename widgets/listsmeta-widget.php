<?php

class Elementor_Widget_Listmeta extends \Elementor\Widget_Base {
	public function get_name() {
		return 'listsmeta';
	}

	public function get_title() {
		return esc_html__( 'Lists Meta', 'elementor-listsmeta' );
	}

	public function get_icon() {
		return 'eicon-post-info';
	}

	public function get_custom_help_url() {}

	public function get_categories() {
		return array( 'theme-elements-single' );
	}

	public function get_keywords() {
		return [ 'post', 'info', 'taxonomy', 'custom', 'lists', 'meta' ];
	}

	public function get_script_depends() {
		wp_register_script( 'widget-script-listsmeta', plugins_url( 'assets/js/listsmeta.js', ELEMENTOR_LISTSMETA_FILE ) );

		return [
			'widget-script-listsmeta'
		];
	}

	public function get_style_depends() {
		wp_register_style( 'widget-style-listsmeta', plugins_url( 'assets/css/listsmeta.css', ELEMENTOR_LISTSMETA_FILE ) );

		return [
			'widget-style-listsmeta'
		];
	}

	protected function register_controls() {
		$this->start_controls_section(
			'section_icon',
			[
				'label' => esc_html__( 'Lists Meta', 'elementor-listsmeta' ),
			]
		);
		$this->add_control(
			'taxonomy',
			[
				'label' => esc_html__( 'Taxonomy', 'elementor-listsmeta' ),
				'type' => \Elementor\Controls_Manager::SELECT2,
				'label_block' => true,
				'default' => [],
				'options' => $this->get_taxonomies()
			]
		);
		$this->add_control(
			'order',
			[
				'label' => esc_html__( 'Order', 'elementor-listsmeta' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'options' => [
					'asc' => esc_html__( 'ASC', 'elementor-listsmeta' ),
					'desc' => esc_html__( 'DESC', 'elementor-listsmeta' )
				],
				'default' => 'asc'
			]
		);
		$this->add_control(
			'link',
			[
				'label' => esc_html__( 'Link', 'elementor-listsmeta' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'default' => 'yes'
			]
		);
		$this->add_control(
			'show_icon',
			[
				'label' => esc_html__( 'Icon', 'elementor-listsmeta' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'options' => [
					'none' => esc_html__( 'None', 'elementor-listsmeta' ),
					'default' => esc_html__( 'Default', 'elementor-listsmeta' ),
					'custom' => esc_html__( 'Custom', 'elementor-listsmeta' ),
				],
				'default' => 'default'
			]
		);
		$this->add_control(
			'selected_icon',
			[
				'label' => esc_html__( 'Choose Icon', 'elementor-listsmeta' ),
				'type' => \Elementor\Controls_Manager::ICONS,
				'fa4compatibility' => 'icon',
				'condition' => [
					'show_icon' => 'custom'
				],
			]
		);
		$this->end_controls_section();

		$this->start_controls_section(
			'section_icon_list',
			[
				'label' => esc_html__( 'List', 'elementor-listsmeta' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_responsive_control(
			'space_between',
			[
				'label' => esc_html__( 'Space Between', 'elementor-listsmeta' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'max' => 50,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .elementor-listsmeta-items .elementor-icon-list-item .elementor-post-info__terms-list-item' => 'padding-left: {{SIZE}}{{UNIT}}',
				],
			]
		);

		$this->add_responsive_control(
			'vertical_padding',
			[
				'label' => esc_html__( 'Vertical Padding', 'elementor-listsmeta' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'max' => 50,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .elementor-listsmeta-items .elementor-icon-list-item:not(:last-child)' => 'padding-bottom: {{SIZE}}{{UNIT}}',
				],
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'section_icon_style',
			[
				'label' => esc_html__( 'Icon', 'elementor-listsmeta' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'icon_color',
			[
				'label' => esc_html__( 'Color', 'elementor-listsmeta' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .elementor-listsmeta-items .elementor-icon-list-icon i' => 'color: {{VALUE}};',
					'{{WRAPPER}} .elementor-listsmeta-items .elementor-icon-list-icon svg' => 'fill: {{VALUE}};',
				],
				'global' => [
					'default' => \Elementor\Core\Kits\Documents\Tabs\Global_Colors::COLOR_PRIMARY,
				],
			]
		);

		$this->add_responsive_control(
			'icon_size',
			[
				'label' => esc_html__( 'Size', 'elementor-listsmeta' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'default' => [
					'size' => 14,
				],
				'range' => [
					'px' => [
						'min' => 6,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .elementor-listsmeta-items .elementor-icon-list-icon' => 'width: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}} .elementor-listsmeta-items .elementor-icon-list-icon i' => 'font-size: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}} .elementor-listsmeta-items .elementor-icon-list-icon svg' => '--e-icon-list-icon-size: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'section_text_style',
			[
				'label' => esc_html__( 'Text', 'elementor-listsmeta' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'text_color',
			[
				'label' => esc_html__( 'Text Color', 'elementor-listsmeta' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .elementor-listsmeta-items .elementor-post-info__terms-list-item' => 'color: {{VALUE}}',
				],
				'global' => [
					'default' => \Elementor\Core\Kits\Documents\Tabs\Global_Colors::COLOR_SECONDARY,
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'icon_typography',
				'selector' => '{{WRAPPER}} .elementor-listsmeta-items .elementor-icon-list-item .elementor-post-info__terms-list-item',
				'global' => [
					'default' => \Elementor\Core\Kits\Documents\Tabs\Global_Typography::TYPOGRAPHY_TEXT,
				],
			]
		);

		$this->end_controls_section();
	}

	protected function render() {
		$settings = $this->get_settings_for_display();
		$item_data = [];
		$show_icon = $settings['show_icon'];
		$selected_icon = $settings['selected_icon'];
		$default_icon = 'fas fa-check';
		$order = strtoupper($settings['order']);
		$arr_fields = [
			'order' => $order
		];

		ob_start();

		if($show_icon == 'custom'):
			if(!empty($selected_icon['value']) && !empty($selected_icon['library'])){
				$default_icon = $selected_icon['value'];
			}
		endif;

		$item_data['itemprop'] = 'about';
		$taxonomy = $settings['taxonomy'];
		// $tax_index = $settings['_id'];
		$terms = wp_get_post_terms( get_the_ID(), $taxonomy, $arr_fields );
		foreach ( $terms as $term ) {
			$item_data['terms_list'][ $term->term_id ]['text'] = $term->name;
			$item_data['terms_list'][ $term->term_id ]['icon'] = $default_icon;
			if ( 'yes' === $settings['link'] ) {
				$item_data['terms_list'][ $term->term_id ]['url'] = get_term_link( $term );
			}
		}

		if ( empty( $item_data['text'] ) && empty( $item_data['terms_list'] ) ) {
			return;
		}

		$has_link = false;
		// $link_key = 'link_' . $tax_index;
		// $item_key = 'item_' . $tax_index;

		// $this->add_render_attribute( $item_key, 'class',
		// 	[
		// 		'elementor-icon-list-item',
		// 		'elementor-index-item-' . $settings['_id'],
		// 	]
		// );

		// if ( ! empty( $item_data['url']['url'] ) ) {
		// 	$has_link = true;

		// 	$this->add_link_attributes( $link_key, $item_data['url'] );
		// }

		// if ( ! empty( $item_data['itemprop'] ) ) {
		// 	$this->add_render_attribute( $item_key, 'itemprop', $item_data['itemprop'] );
		// }
		?>
		<div class="listsmeta-content">
			<ul class="elementor-listsmeta-items">
			<?php
			if ( ! empty( $item_data['terms_list'] ) ) :
				$terms_list = [];
				$item_class = 'elementor-post-info__terms-list-item';
				?>
				<?php
				foreach ( $item_data['terms_list'] as $term ) :
				?>
					<li class="elementor-icon-list-item">
						<?php if($show_icon != 'none'): ?>
							<span class="elementor-icon-list-icon">
								<i class="<?php echo $term['icon']; ?>" aria-hidden="true"></i>
							</span>
						<?php endif; ?>
				<?php
					if ( ! empty( $term['url'] ) ) :
				?>
						<a href="<?php echo esc_attr( $term['url'] ); ?>" class="<?php echo $item_class; ?>"><?php echo esc_html( $term['text'] ); ?></a>
				<?php
					else :
				?>
						<span class="<?php echo $item_class; ?>"><?php echo esc_html( $term['text'] ); ?></span>
				<?php
					endif;
				?>
					</li>
				<?php
				endforeach;
				?>
			<?php else : ?>
				<?php
				echo wp_kses( $item_data['text'], [
					'a' => [
						'href' => [],
						'title' => [],
						'rel' => [],
					],
				] );
				?>
			<?php endif; ?>
			</ul>
		</div>
		<?php
		echo ob_get_clean();
	}

	protected function content_template() {}

	protected function get_taxonomies() {
		$taxonomies = get_taxonomies( [
			'show_in_nav_menus' => true,
		], 'objects' );

		$options = [
			'' => esc_html__( 'Choose', 'elementor-listsmeta' ),
		];

		foreach ( $taxonomies as $taxonomy ) {
			$options[ $taxonomy->name ] = $taxonomy->label;
		}

		return $options;
	}
}