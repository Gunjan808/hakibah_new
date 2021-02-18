<?php
// -----------------------------------------------------------
// 					GET_DATA_FROM FUNCTION
// -----------------------------------------------------------
if (!function_exists('get_data_from')) {
	/** Format Numaric String to Indian Currency Format
	 * @param mixed $price
	 * @return string|0 */
	function get_data_from($table)
	{
		$ci = get_instance();
		if ($ci->db->table_exists($table)) {
			$ci->tableName = $table;

			$ci->db->select($table . '.*, parent.first_name, parent.last_name, parent.profile_pic');

			$ci->db->field_exists('created_by', $ci->tableName)
				and $ci->db->join('users as parent', $table . '.created_by = parent.id');

			$ci->db->where([$table . '.status' => true]);
			$ci->db->order_by($table . '.id', 'desc');

			$query = $ci->db->get($ci->tableName);
			return $query->result();
		}
		return error_show('`' . $table . '` Table Not Exists.');
	}
}


// -----------------------------------------------------------
// 					GET_SINGLE_DATA_FROM FUNCTION
// -----------------------------------------------------------
if (!function_exists('get_signle_data_from')) {
	/** Get Single Object Row from Table
	 * @param string $table Table Name
	 * @param array $condition Where Condition
	 * @return object|error_string
	 */
	function get_signle_data_from(string $table = '', array $condition = [])
	{
		$ci = get_instance();
		if ($ci->db->table_exists($table)) {
			$ci->tableName = $table;

			$ci->db->select('*');

			!empty($condition) and $ci->db->where($condition);

			$query = $ci->db->get($ci->tableName);
			if (is_array($query->result()) && isset($query->result()[0]) && !empty($query->result()[0]))
				return $query->result()[0];
			return false;
		}
		return error_show('`' . $table . '` Table Not Exists.');
	}
}



// -----------------------------------------------------------
// 					GET_UNIQUE_SLUG FUNCTION
// -----------------------------------------------------------
if (!function_exists('get_unique_slug')) {
	/** Get Unique Slug From Title
	 * @param string $table Table Name where to check
	 * @param string $title Title which is use for create slug
	 * @param sting $oldSlug Old Slug for Update Query
	 * @return string Slug
	 */
	function get_unique_slug(string $table = '', string $title = ''): string
	{
		/** @var string url friendly slug */
		$slug = url_title($title, '-', true);

		/** @var array table's Where Condition */
		$whereCondition  = [$table, ['slug' => $slug]];

		$slug_exits = get_signle_data_from(...$whereCondition);

		if (isset($slug_exits) && !empty($slug_exits) && is_object($slug_exits))
			while (true == false) {
				$slug = increment_string(url_title($slug, '-', true), '-');
				$slug_exit_check_again = get_signle_data_from(...$whereCondition);

				if (!(isset($slug_exit_check_again) && !empty($slug_exit_check_again) && is_object($slug_exit_check_again)))
					return $slug;
			}

		return $slug;
	}
}

if (!function_exists('get_title')) {
	/** Format Numaric String to Indian Currency Format
	 * @param mixed $price
	 * @return string|0 */
	function get_title($table, $id)
	{
		$ci = get_instance();
		if ($ci->db->table_exists($table)) {
			$ci->tableName = $table;

			$ci->db->select($table . '.title');

			$ci->db->where(['id' => $id]);

			$query = $ci->db->get($ci->tableName);

			/* echo $ci->db->last_query();
			die; */

			return $query->result()[0]->title;
		}
		return error_show('`' . $table . '` Table Not Exists.');
	}
}


if (!function_exists('get_properties_details')) {

	function get_properties_details($data)
	{
		$ci = &get_instance();

		// Get Project Filter ID
		$project = $ci->db->get_where("filters", ['slug' => 'projects'])->first_row();
		is($project, 'json') and $project_id = $project->id;

		// Get Location Filter ID
		$location = $ci->db->get_where("filters", ['slug' => 'locality'])->first_row();
		is($location, 'json') and $location_id = $location->id;

		if (is($data))
			foreach ($data as $key => $value) {

				// Get Project & Property Relation
				is($project_id) and $project_relation = $ci->db->get_where("filter_product_category_relations", [
					'key_id'     => $project_id,
					'product_id' => $value->id
				])->first_row();
				is($project_relation, 'json') and $project_value_id = $project_relation->value_id;

				// Get Project Name
				is($project_value_id) and $project = $ci->db->get_where("filter_values", ['id' => $project_value_id])->first_row();
				is($project, 'json') and $project_name = $project->filter_value_title;

				// Send with Data
				is($project_name) and $data[$key]->project = $project_name;

				// Get Location Relation
				is($location_id) and $location_relation = $ci->db->get_where("filter_product_category_relations", [
					'key_id'     => $location_id,
					'product_id' => $value->id
				])->first_row();
				is($location_relation, 'json') and $location_value_id = $location_relation->value_id;

				// Get Location Name
				is($location_value_id) and $locationss = $ci->db->get_where("filter_values", ['id' => $location_value_id])->first_row();
				is($locationss, 'json') and $location_name = $locationss->filter_value_title;

				// Send with Data
				is($location_name) and $data[$key]->location = $location_name;

				//city
				is($value->extra_field_1) and $data[$key]->city = $value->extra_field_1;

				// Get Image
				strpos($value->image, '@') and $img = explode('@', $value->image) and is_array($img) and $data[$key]->image = $img[0] or $data[$key]->image = $value->image;
			}

		return $data;
	}
}



if (!function_exists('register_cpt')) {

	function register_cpt()
	{

		return [
			'blog'          => ['blog', 'Blog', 'operation'],
			'courses'       => ['courses', 'Courses', 'operation'],
			'latestnews'    => ['latestnews', 'Latest News', 'operation'],
			'FreeDownloads' => ['freedownloads', 'Free Downloads', 'operation'],
			'Toppers'       => ['toppers', 'Toppers', 'operation'],
			'StudentZone'   => ['studentzone', 'Student Zone', 'operation'],
			'Admission'     => ['admission', 'Admission', 'operation'],
			'Testimonials'  => ['testimonials', 'Testimonials', 'operation'],
		];
	}
}

if (!function_exists('register_cpt_sidebar')) {

	function register_cpt_sidebar()
	{

		$register_cpt = register_cpt();

		foreach (register_cpt() as $k => $v) { ?>
			<li class="menu">
				<a href="<?php echo SITE_URL . 'list/cpt/' . $v[0]; ?>" aria-expanded="false" class="dropdown-toggle">
					<div class="">
						<?php echo ICONS[$v[2]]; ?>
						<span><?= $v[1] ?></span>
					</div>
				</a>
			</li>
<?php
		}
	}
}



/* End of file db_helper.php */
