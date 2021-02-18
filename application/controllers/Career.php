<?php defined('BASEPATH') or exit('No direct script access allowed');
/** Load Order Pages & Queries */
class Career extends CI_Controller
{

    /** application Status Values
     *
     * @var array */
    protected $application = [
        '0' => 'new',
        '1' => 'hired',
        '2' => 'approved',
        '3' => 'save for later'
    ];


    public function __construct()
    {
        parent::__construct();
        //Do your magic here
        flash_message(
            'dashboard/login',
            is_login(),
            'unsuccess',
            'Please Login Then Try Again'
        );

        $this->load->helper('string');
        $this->load->model([
            'CareerModel',
            'UsersModel'
        ]);
    }

    /** Load Default Index To Show 404 Error
     *
     * @return void */
    public function index()
    {
        return show_404();
    }

    /** Load application(career) List Page */
    public function list_application()
    {
        $applications = $this->CareerModel->all([
            'order' => [
                'by'   => 'id',
                'type' => 'DESC'
            ],
            'datatype' => 'json'
        ]);

        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('career/list', compact('applications'));
        $this->load->view('template/footer');
    }

    /** Edit Order */
    public function edit_order($order_no)
    {
        empty($order_no) and show_404();

        flash_message(
            'dashboard/login',
            is_login(),
            'unsuccess',
            'Please Login Then Try Again'
        );

        user_can('order_edit') or show_404();

        if ($this->input->post('editOrder')) {

            flash_message(
                'edit/order/' . $order_no,
                $this->input->post('product'),
                is_array($this->input->post('product'))
                    and $this->input->post('user')
                    and $this->input->post('paymentMode')
                    and $this->input->post('paymentStatus')
                    and $this->input->post('status')
                    and $this->input->post('remark'),
                'unsuccess',
                'Something Went Wrong',
                'Look like Form Not Fill Properly, Please Fill & Try Again.'
            );
            is($_POST['product'], 'array')
                and $products = $this->input->post('product');

            $order_group_id = $order_no;

            if (is($products, 'array'))
                foreach ($products as $value) {
                    $product = json_decode(json_encode($this->ProductsModel->first([
                        'conditions' => [
                            'id'        => $value,
                            'post_type' => 'product'
                        ],
                        'fields' => ['id', 'sell_price']
                    ])));

                    $price      = (int) $product->sell_price;
                    $product_id = $product->id;

                    $this->agent->is_mobile()   and $device_type = 'mobile';
                    $this->agent->is_browser()  and $device_type = 'web';
                    !$this->agent->is_browser() and !$this->agent->is_mobile() and $device_type = 'rest';

                    $this->OrdersModel->destroy(['order_group_id' => $order_no]);

                    $order_id = $this->OrdersModel->save([
                        'order_group_id'   => $order_group_id,
                        'user_id'          => str_clean($this->input->post('user')),
                        'product_id'       => $product_id,
                        'product_quantity' => '1',
                        'total_amount'     => $price,
                        'total_paid'       => $price,
                        'remark'           => str_clean($this->input->post('remark'), [' ', ', ', '-', '_', '.', "'"]),
                        'payment_mode'     => str_clean($this->input->post('paymentMode')),
                        'payment_status'   => $this->input->post('paymentStatus'),
                        'delivery_status'  => $this->input->post('status'),
                        'status'           => true,
                        'transaction_id'   => random_string('md5', 20),
                        'transaction_msg'  => 'backend',
                        'user_ip'          => $this->input->ip_address(),
                        'browser'          => $this->agent->browser(),
                        'browser_version'  => $this->agent->version(),
                        'device_type'      => $device_type,
                        'os'               => $this->agent->platform(),
                        'mobile_device'    => $this->agent->mobile(),
                        'created_by'       => $_SESSION['USER_ID'],
                        'modified_by'      => $_SESSION['USER_ID'],
                    ]);
                }

            flash_message(
                'list/orders',
                $order_id,
                'unsuccess',
                'Something Went Wrong'
            );

            flash_message(
                'list/orders',
                $order_id,
                'success',
                'Order Added Successfully'
            );
        }

        $orders = $this->OrdersModel->all([
            'conditions' => [
                'status!='       => '3',
                'order_group_id' => $order_no
            ],
            'datatype' => 'json'
        ]);

        $products = $this->ProductsModel->all([
            'feilds'     => ['id', 'title'],
            'conditions' => [
                'status!='  => 3,
                'post_type' => 'product'
            ],
            'datatype' => 'json'
        ]);

        $users = $this->UsersModel->all([
            'feilds'     => ['id', 'first_name', 'last_name'],
            'conditions' => [
                'status'    => true,
                'user_type' => 'SUBSCRIBER'
            ],
            'datatype' => 'json'
        ]);

        $payments = $this->Payment;
        $delivery = $this->Delivery;

        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('order/edit', compact('orders', 'products', 'users', 'payments', 'delivery'));
        $this->load->view('template/footer');
    }

    /** Delete Order */
    public function change_status($id)
    {
        // empty()and show_404();

        flash_message(
            'dashboard/login',
            is_login(),
            'unsuccess',
            'Please Login Then Try Again'
        );

        // user_can('change_status') or show_404();
        $appeal = $this->CareerModel->updateTable([
            'status' => '1',
        ], ['id' => $id]);
        flash_message(
            'list/career',
            $appeal,
            'unsuccess',
            "Something Went Wrong"
        );

        flash_message(
            'list/career',
            $appeal,
            'success',
            "Application Status Changed to Approved"
        );
    }
}

    /* End of file  Order.php */
