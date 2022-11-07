<?php 

    require "includes/nav.php";
    require "query/Query.php";
    $query = new Query();
    
    date_default_timezone_set('Asia/Yangon');
    $today_date = date('Y-m-d');
    $month = date('m');
    $date = date('d');
 
    $incomes = $query->select('incomes','*', null, "MONTH(created_at)='$month'");
    
    $expands = $query->select('expands',"SUM(amount) ", null, null, "created_at");
   
    $employee_expands = $query->select('employee_expands', 'SUM(amount)',null, null, "created_at");

    if($_SERVER['REQUEST_METHOD'] == 'POST') {
    
        $date = $_POST['find_date'];
        if(isset($date)) {
            foreach($incomes as $income) {
                if($date == date("Y-m-d", strtotime($income['created_at']))) {
                    header("location:detail_income_expand.php?income_date=$date");
                }else{
                    echo "Does Not exist!";
                    return;
                }
            }
        }
       
        
    }

?>

<div class="container my-4">
        <div class="row col-lg-6 col-md-8 col-12 offset-lg-3 offset-md-2">
            <!-- <h3 class=" mb-5">စုစုပေါင်းဝင်ငွေ</h3> -->
            <form action="" class="" method="post">
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">စုစုပေါင်းဝင်ငွေ</label>
                    <input type="date" class="form-control" name="find_date" required id="exampleInputEmail1" placeholder="စုစုပေါင်းဝင်ငွေ" aria-describedby="emailHelp">
                    
                </div>
               
                <button type="submit" class="btn border border-dark col-12">ကြည့်မယ်</button>
            </form>
            <hr class="mt-5">
            <p class="text-center">ဝင်ငွေနှင့်အသုံးများ</p>
            <div class="table-responsive">
             
                <table class="table table-striped" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Date</th>
                            <th>Income</th>
                            <th>Remain</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                            foreach ($incomes as $key => $income) {
                        ?>
                        <tr>
                            <td><a href="detail_income_expand.php?income_date=<?php echo date("Y-m-d", strtotime($income['created_at']));?>"><?php echo date("d.m.Y", strtotime($income['created_at']));?></a></td>
                            <td><?php echo $income['total_income']?> Ks</td>
                            <td><?php echo $income['total_income'] - ($employee_expands[$key][0] + $expands[$key][0])?> Ks</td>

                        </tr>
                        <?php }?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

<?php 

    require "includes/footer.php";

?>