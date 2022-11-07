<?php 
    require "includes/nav.php";
    require "query/Query.php";

    $query = new Query();

    $get_income_date = $_GET['income_date'];
    var_dump($get_income_date);
    echo "<br>";
    $income = $query->select('incomes','*', null, "DATE(created_at)='$get_income_date'",null, '1');
    //var_dump($income);

    $incomeDate = date("d.m.Y", strtotime($income['created_at'])); 

    $expands = $query->select('expands','*', null, "DATE(created_at)='$get_income_date'");
    //var_dump($expand);

    // var_dump($income);
    
    $expands_total = 0;
    foreach($expands as $expand) {
        $expands_total += $expand['amount'];
      
    }

    $employee_expands = $query->select('employee_expands', 'employee_expands.*, employees.name as e_name','employees ON employee_expands.employee_id = employees.id', "DATE(employee_expands.created_at)='$get_income_date'");
    //var_dump($income('created_at'));
    
    if($_SERVER['REQUEST_METHOD'] == 'POST') {
        $total_income = $_POST['total-income'];
        $income_id = $_POST['income_id'];
        $expand_id = $_POST['expand_id'];
        $employee_id = $_POST['employee_id'];
        $expand_name = $_POST['expand_name'];
        $expand_amount = $_POST['expand_amount'];
       $employee_expand_name = $_POST['employee_expand_name'];

        $employee_expand_amount = $_POST['employee_expand_amount'];

        try{
            if (isset($total_income)) {
                $datas = [
                    'total_income' => $total_income,
                ];
                $query->update('incomes',$datas, 'id = '.$income_id);
            }

            if (isset($expand_name) && isset($expand_amount)) {
                for ($i=0; $i < count($expand_name); $i++) {
                   
                    if(isset($expand_id[$i])) {
                        $datas = [
                            'reason' => $expand_name[$i],
                            'amount' => $expand_amount[$i]
                        ];
                        $query->update('expands',$datas, 'id = '.$expand_id[$i]);
                    }else {
                        $datas = [
                            'reason' => $expand_name[$i],
                            'amount' => $expand_amount[$i]
                        ];
                        $query->store('expands',$datas);
                    }
                   
                }
                

            }

            if(isset($employee_expand_name) && isset($employee_expand_amount)) {
                for ($i=0; $i < count($employee_expand_amount); $i++) {
                    if(isset($employee_id[$i])) {
                        $datas = [
                            'employee_id' => $employee_expand_name[$i],
                            'amount' => $employee_expand_amount[$i]
                        ];
                         $query->update('employee_expands',$datas, 'id = '.$employee_id[$i]);
                    }else{
                        $datas = [
                            'employee_id' => $employee_expand_name[$i],
                            'amount' => $employee_expand_amount[$i]
                        ];
                         $query->store('employee_expands',$datas);
                    }
                   
                }
                
            }
            // $income = $query->select('incomes','*', null, "DATE(created_at)='$today_date'",null, '1');
            // $income_data_str = strtotime($income['created_at']);
            // $income_date= date("Y-m-d", $income_data_str);
            // header("location:detail_income_expand.php?income_date=$income_date");
         
           
            if(isset($_POST['expand_del'])) {
                $id = $_POST['expand_del'];
                $query->delete('expands', 'id = '.$id);

                header("location:".$_SERVER['HTTP_REFERER']);
            }
               
            if(isset($_POST['employee_del'])) {
                $id = $_POST['employee_del'];
                var_dump($id);
                $query->delete('employee_expands', 'id = '.$id);

                 header("location:".$_SERVER['HTTP_REFERER']);
            }

        }catch(PDOException $e) {
            echo $e->getMessage();
        }
        
    }
?>
    <div class="container my-4">

        <div class="row col-lg-6 col-md-8 col-12 offset-lg-3 offset-md-2">

            <h3 class=" mb-5">ဝင်ငွေနှင့် အသုံးများ ပြင်ရန်</h3>

            <form action="" method="post" >

                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">စုစုပေါင်းဝင်ငွေ</label>
                    <input type="hidden" name="income_id" value="<?php echo $income['id'];?>" >
                    <input type="number" class="form-control" name="total-income" id="exampleInputEmail1" placeholder="စုစုပေါင်းဝင်ငွေ" value="<?php echo $income['total_income']; ?>" aria-describedby="emailHelp"> 
                </div>
                
                <div class=" mb-3" id="list">
                    <div class="row mb-2">
                        <label class="col" for="exampleInputPassword1" class="form-label">အသုံးများ</label>
                        <label class="col text-end add-expand-imcome" for=""><i data-feather="plus"></i></label>
                    </div>
                    <?php 
                        foreach ($expands as $expand) {
                    ?>
                    <div class="row mb-3">

                        <div class="col-7">
                            <input type="hidden" name="expand_id[]" value="<?php echo $expand['id'];?>">
                            <input type="text" class="form-control" name="expand_name[]" placeholder="အသုံး"  value="<?php echo $expand['reason'];?>"  id="exampleInputPassword1">
                        </div>

                        <div class=" col-5">
               
                            <div class="input-group">
                                <input type="number" class="form-control" name="expand_amount[]" placeholder="ပမာဏ" value="<?php echo $expand['amount'];?>" id="exampleInputPassword1">
                                <button class="btn btn-outline-secondary" type="submit" id="button-addon2" onclick="return confirm('Are you sure delete');" name="expand_del" value="<?php echo $expand['id'];?>">x</button>
                            </div>

                        </div>
                       
                    </div>

                    <?php }?>
                   
                </div>

                <div class=" mb-3" id="employee">
                    <div class="row mb-2">
                        <label class="col" for="exampleInputPassword1" class="form-label">ဝန်ထမ်းများအသုံး</label>
                        <label class="col text-end add-employee " for=""><i data-feather="plus"></i></label>
                    </div>
                    <?php 
                        foreach ($employee_expands as $employee_expand) {
                    ?>
                    <div class="row">
                        <div class="col-7">
                            <input type="hidden" name="employee_id[]" value="<?php echo $employee_expand['id'];?>">
                            <select class="form-select mb-3" name="employee_expand_name[]" aria-label="Default select example" placeholder="ရွှေးချယ်ပါ...">
                                <option >ရွှေးချယ်ပါ...</option>
                                <?php 
                                
                                    $employees = $query->select('employees');

                                    foreach( $employees as $employee) {
                                ?>
                                <option value="<?php echo $employee['id']; ?>" <?php if($employee_expand['employee_id'] == $employee['id']) {echo 'selected';}?>><?php echo $employee['name'];?></option>

                                <?php 
                                    }
                                ?>
                            </select> 
                        </div>
                        <div class="col-5">
                            <div class="input-group">
                                <input type="number" class="form-control"  name="employee_expand_amount[]" placeholder="ပမာဏ" value="<?php echo $employee_expand['amount'] ?>" id="exampleInputPassword1">
                                <button class="btn btn-outline-secondary" type="submit" id="button-addon2" onclick="return confirm('Are you sure delete');" name="employee_del" value="<?php echo $employee_expand['id'] ;?>">x</button>
                            </div>
                        </div>
                    </div>
                    <?php }?>
                </div>
                
                <button type="submit" class="btn border border-dark col-12">သိမ်းမည်</button>
            </form>
        </div>
    </div>




    <script src="jq/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.add-expand-imcome').on('click',function() {
                
                let data = `
                        <div class="row mb-2">
                            <label class="col" for="exampleInputPassword1" class="form-label">အသုံးများ</label>
                            <label class="col text-end add-more" for=""><i data-feather="plus"></i></label>
                        </div>
                        <div class="row ">
                            <div class="col-7">
                                <input type="text" class="form-control" name="expand_name[]" placeholder="အသုံး" id="exampleInputPassword1">
                            </div>
                            <div class="col-5">
                                <input type="number" name="expand_amount[]" class="form-control" placeholder="ပမာဏ" id="exampleInputPassword1">
                            </div>
                        </div>`;

                $('#list').append(data);
            });

            $('.add-employee').on('click',function() {
                let employee = `
                            <div class="row mb-2">
                                <label class="col" for="exampleInputPassword1" class="form-label">ဝန်ထမ်းများအသုံး</label>
                                <label class="col text-end add-employee" for=""><i data-feather="plus"></i></label>
                            </div>
                            <div class="row">
                                <div class="col-7">
                                    <select class="form-select mb-3" name="employee_expand_name[]" aria-label="Default select example" placeholder="ရွှေးချယ်ပါ...">
                                        <option selected>ရွှေးချယ်ပါ...</option>
                                        <?php 
                                
                                            $employees = $query->select('employees');

                                            foreach( $employees as $employee) {

                                            
                                        
                                        ?>
                                        <option value="<?php echo $employee['id']; ?>"><?php echo $employee['name'];?></option>

                                        <?php 
                                            }
                                        ?>
                               
                                    </select> 
                                </div>
                                <div class="col-5">
                                    <input type="number" name="employee_expand_amount[]" class="form-control" placeholder="ပမာဏ" id="exampleInputPassword1">
                                </div>
                            </div>`;
                $('#employee').append(employee);
            });

        });
    </script>

<?php 

    require "includes/footer.php";

?>