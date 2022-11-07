<?php 
    require "includes/nav.php";
    require "query/Query.php";

    $query = new Query();

    $get_income_date = $_GET['income_date'];
    //var_dump($get_income_date);
    if($get_income_date)
  
    $income = $query->select('incomes','*', null, "DATE(created_at)='$get_income_date'",null, '1');
    
    //var_dump($income['created_at']);

    //var_dump($income);

    $incomeDate = date("d.m.Y", strtotime($income['created_at'])); 

    $expands = $query->select('expands','*', null, "DATE(created_at)='$get_income_date'");
    //var_dump($expands);
    
    $expands_total = 0;
    foreach($expands as $expand) {
        $expands_total += $expand['amount'];
      
    }
    //var_dump($expands_total);
    $employee_expands = $query->select('employee_expands', 'employee_expands.*, employees.name as e_name','employees ON employee_expands.employee_id = employees.id', "DATE(employee_expands.created_at)='$get_income_date'");
    //var_dump($employee_expands);
    $employee_expand_total = 0;
    foreach($employee_expands as $employee_expand) {
        $employee_expand_total += $employee_expand['amount'];
    }
   
    $All_empand =$expands_total + $employee_expand_total;

?>
    <div class="container my-4">
        <div class="row col-lg-6 col-md-8 col-12 offset-lg-3 offset-md-2">
            <p class="text-center m-0"><?php echo $incomeDate?> ရက်နေ့</p>
            <p class="mb-4 text-center">ဝင်ငွေနှင့်အသုံးများ</p>
            <form action="" method="post" >
           
                
                <div class=" mb-3" id="list">
                    <div class="row mb-2">
                        <p class="col" for="exampleInputPassword1" class="form-label">စုစုပေါင်းဝင်ငွေ</p>
                        <p class="col text-end add-expand-imcome" for=""><?php echo $income['total_income']?> ကျပ်</p>
                    </div>
                    <div class="row mb-2">
                        <h6 class="col fw-bold" for="exampleInputPassword1" class="form-label">အသုံးများ</h6>
                    </div>
                    <?php 
                        foreach($expands as $expand) {
                    ?>
                    <div class="row mb-2">
                        <p  class="col" for="exampleInputPassword1" class="form-label"><?php echo $expand['reason'];?></p>
                        <p class="col text-end " for=""><?php echo $expand['amount'];?> ကျပ်</p >
                    </div>
                    <?php 
                        }
                    ?>
                    <div class="row mb-2">
                        <h6 class="col fw-bold" for="exampleInputPassword1" class="form-label">ဝန်ထမ်းများအသုံး</h6>
                    </div>
                    <?php 
                        foreach ($employee_expands as $employee_expand) {
                    ?>
                    <div class="row mb-2">
                        <p  class="col" for="exampleInputPassword1" class="form-label"><?php echo $employee_expand['e_name']?></p>
                        <p class="col text-end " for=""><?php echo $employee_expand['amount']?> ကျပ်</p >
                    </div>
                    <?php 
                        }
                    ?>
                </div>
                <hr>
                <div class=" mb-3" id="list">
                    <div class="row mb-2">
                        <p class="col" for="exampleInputPassword1" class="form-label">စုစုပေါင်းဝင်ငွေ</p>
                        <p class="col text-end " for=""><?php echo $income['total_income']?>  ကျပ်</p>
                    </div>
                    <div class="row mb-2">
                        <p class="col" for="exampleInputPassword1" class="form-label">စုစုပေါင်းအသုံး</p>
                        <p class="col text-end" for=""><?php echo $All_empand?> ကျပ်</p>
                    </div>

                </div>
                <hr>
                <div class=" mb-3" id="list">
                    <div class="row mb-2">
                        <p class="col" for="exampleInputPassword1" class="form-label">စုစုပေါင်းကျန်ငွေ</p>
                        <p class="col text-end fw-bold" for=""><?php echo $income['total_income'] - $All_empand?> ကျပ်</p>
                    </div>
                </div>
            
             
                
                <a href="edit_expand_income.php?income_date=<?php echo $get_income_date; ?>" class="btn border border-dark col-12">ပြင်မယ်</a>
            </form>
        </div>
    </div>

    <script src="jq/jquery.min.js"></script>
   
<?php 

    require "includes/footer.php";

?>