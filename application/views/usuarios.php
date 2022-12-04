
<div class="container-fluid " style="min-height:80vh; margin-top:50px;">
<table id="example" class="table table-striped dataTable" cellspacing="0" width="100%">
</table>
<script>
        var dataSet = [
                <?php
                    
                    if(isset($_ci_vars)){
                        //$data =  $_ci_vars;
                        //echo json_encode($_ci_vars);
                        
                        //echo $data.',';
                        
                        $data = $_ci_vars;
                            foreach($data as $row){
                                echo "['".$row['id']."', '".$row['nombre']."', '".$row['email']."', '".$row['genero']."', '".$row['activo']."'],";
                            }  
                    }
                ?>            
        ];

        $(document).ready(function() {
            
            $('#example').DataTable({
                data: dataSet,
                class: 'browser-default',
                columns: [
                    { title: 'id' },
                    { title: 'nombre' },
                    { title: 'email' },
                    { title: 'genero' },
                    { title: 'activo' },
                ],
            })

        });

    </script>     

</div>