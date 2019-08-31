<?php
if (isset($data)) {
    unlink('../exp/customer_data.csv');
    $name = 'customer_data.csv';
    $file = '../exp/' . $name;
    $open_file = fopen($file, "w");
    $lable = "number;name;job; email;mobile;address;birth_date;course_name;course_start_date;course_days;course_cost;pay;last\n";
    //if (!empty(strpos(',', $data))) {
    $customers = explode(',', $data);
//    } else {
//    $customers = $data;
    // }
    $datavalue = '';
    $i = 1;
    foreach ($customers as $id) {
        $data2 = CourseModel::get_all_data_for_exel_sheet($id)[0];
        $datavalue .=$i++ . ";" . $data2['cus_name'] . ";" . $data2['cus_job'] . ";" . $data2['cus_email'] .
                ";" . $data2['cus_mobile'] . ";" . $data2['cus_address'] . ";" . $data2['cus_birth_date'] . ";" . $data2['cor_name']
                . ";" . $data2['cor_start_date'] . ";" . $data2['cor_days'] . ";" . $data2['cor_cost'] . ";"
                . $data2['book_pay'] . ";" . $data2['book_last'] . "\n";
    }
    fputs($open_file, $lable . $datavalue);
    ?>
    
    <script src = "http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js" ></script>
    <script src="//code.jquery.com/jquery-1.9.1.js"></script>
    <script>
    alert(0);
    window.location.href = <?= $file ?>;
    </script>
    <?php
}
?>