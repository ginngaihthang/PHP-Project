<?php 
    require "includes/nav.php";
    require "query/Query.php";
    

    $query = new Query();
    $employee_id = $_GET['employee_id'];
    $employees = $query->select('employees','*',null, 'id = '.$employee_id);
    // var_dump($employees);

   //var_dump($employee_id);
    if($_SERVER['REQUEST_METHOD'] == 'POST') {

        $name = $_POST['employee_name'];
        $nrc = $_POST['employee_nrc'];
        var_dump($nrc);
        $salary = $_POST['employee_salary'];
        $birthday = $_POST['employee_birthday'];
        $description = $_POST['employee_description'];
        $address = $_POST['employee_address'];
    
        var_dump($employee_id);
        
        try{
            if(isset($name) && isset($nrc) && isset($salary) && isset($birthday) && isset($description) && isset($address)) {
                $employees = [
                    'name' => $name,
                    'nrc' => $nrc,
                    'salary' => $salary,
                    'birthday' => $birthday,
                    'description' => $description,
                    'address' => $address
                ];
                $query->update('employees', $employees, 'id = '.$employee_id);
            }

           
           
        }catch(PDOException $e){
            echo $e->getMessage();
        }
      
        
        
        header("location:employee.php");
    }

?>
    <div class="container my-4">
        <div class="row col-lg-6 col-md-8 col-12 offset-lg-3 offset-md-2">
            <h3 class=" mb-5">ဝန်ထမ်းများ ပြင်ရန်</h3>
            <form action="" method="post" >
           
                <?php 
                    foreach ($employees as $employee) {
                ?>
                
        
                <div class=" mb-3" id="list">
                    <div class="row mb-2">
                        <label class="col" for="exampleInputPassword1" class="form-label">နာမည်</label>
                        <label class="col text-end add-expand-imcome" for="">မှတ်ပုံတင်</label>
                    </div>
                    <div class="row mb-3">
                        <div class="col-lg-6 col-md-6 col-12 mb-3">
                            <input type="text" class="form-control" name="employee_name" required placeholder="နာမည်" value="<?php echo $employee['name'] ?>" id="">
                        </div>
                        <div class="col-lg-6 col-md-6 col-12">
                            <input type="text" class="form-control" name="employee_nrc" required placeholder="မှတ်ပုံတင်" value="<?php echo $employee['nrc'] ?>">
                        </div>
                    </div>
                </div>

                <div class=" mb-3" id="list">
                    <div class="row mb-2">
                        <label class="col" for="exampleInputPassword1" class="form-label">လစာ</label>
                        <label class="col text-end add-expand-imcome" for="">မွေးနေ့</label>
                    </div>
                    <div class="row mb-3">
                        <div class="col-lg-6 col-md-6 col-12 mb-3">
                            <input type="numver" class="form-control" name="employee_salary" required placeholder="လစာ"  value="<?php echo $employee['salary'] ?>" >
                        </div>
                        <div class="col-lg-6 col-md-6 col-12">
                            <input type="date" class="form-control" name="employee_birthday" required placeholder="မွေးနေ့" value="<?php echo $employee['birthday'] ?>">
                        </div>
                    </div>
                </div>

                <div class=" mb-3" id="list">
                    <div class="row mb-2">
                        <label class="col" for="exampleInputPassword1" class="form-label">ဖော်ပြချက်</label>
                        <label class="col text-end add-expand-imcome" for="">လိပ်စာ</label>
                    </div>
                    <div class="row mb-3">
                        <div class="col-lg-6 col-md-6 col-12 mb-3">
                            <input type="text" class="form-control" name="employee_description" required placeholder="ဖော်ပြချက်" value="<?php echo $employee['description'] ?>">
                        </div>
                        <div class="col-lg-6 col-md-6 col-12">
                            <input type="text" class="form-control" name="employee_address" required placeholder="လိပ်စာ" value="<?php echo $employee['address'] ?>" >
                        </div>
                    </div>
                    <?php }?>
                
                <button type="submit" class="btn border border-dark col-12">သိမ်းမည်</button>
            </form>
        </div>
    </div>

    <script src="jq/jquery.min.js"></script>
   
<?php 

    require "includes/footer.php";

?>