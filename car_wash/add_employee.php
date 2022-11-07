<?php 
    require "includes/nav.php";
    require "query/Query.php";

    $query = new Query();
    
    if($_SERVER['REQUEST_METHOD'] == 'POST') {

        $name = $_POST['name'];
        $nrc = $_POST['nrc'];
        $salary = $_POST['salary'];
        $birthday = $_POST['birthday'];
        $description = $_POST['description'];
        $address = $_POST['address'];
        
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
                $query->store('employees', $employees);
            }
        }catch(PDOException $e){
            echo $e->getMessage();
        }
      
        
        
        
    }

?>
    <div class="container my-4">
        <div class="row col-lg-6 col-md-8 col-12 offset-lg-3 offset-md-2">
            <h3 class=" mb-5">ဝန်ထမ်းများ မှတ်ရန်</h3>
            <form action="" method="post" >
           
                
                <div class=" mb-3" id="list">
                    <div class="row mb-2">
                        <label class="col" for="exampleInputPassword1" class="form-label">နာမည်</label>
                        <label class="col text-end add-expand-imcome" for="">မှတ်ပုံတင်</label>
                    </div>
                    <div class="row mb-3">
                        <div class="col-lg-6 col-md-6 col-12 mb-3">
                            <input type="text" class="form-control" name="name" required placeholder="နာမည်" id="exampleInputPassword1">
                        </div>
                        <div class="col-lg-6 col-md-6 col-12">
                            <input type="text" class="form-control" name="nrc" required placeholder="မှတ်ပုံတင်" id="exampleInputPassword1">
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
                            <input type="numver" class="form-control" name="salary" required placeholder="လစာ" id="exampleInputPassword1">
                        </div>
                        <div class="col-lg-6 col-md-6 col-12">
                            <input type="date" class="form-control" name="birthday" required placeholder="မွေးနေ့" id="exampleInputPassword1">
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
                            <input type="text" class="form-control" name="description" required placeholder="ဖော်ပြချက်" id="exampleInputPassword1">
                        </div>
                        <div class="col-lg-6 col-md-6 col-12">
                            <input type="text" class="form-control" name="address" required placeholder="လိပ်စာ" id="exampleInputPassword1">
                        </div>
                    </div>
 
                
                <button type="submit" class="btn border border-dark col-12">သိမ်းမည်</button>
            </form>
        </div>
    </div>

    <script src="jq/jquery.min.js"></script>
   
<?php 

    require "includes/footer.php";

?>