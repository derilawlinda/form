
<!DOCTYPE html>
    
    <div class="form-group">
        <form name="addSchedule" id="addSchedule">


            <div class="table-responsive">  
                <table class="table table-borderless" id="tableSchedule">
                    <thead>
                    <tr>
                            <th>Status</th>
                            <th>Tanggal Mulai</th>
                            <th>Tanggal Selesai</th>
                        </tr>
                    </thead>
                    <?php if(count($project_schedules)) : 
                        $i=0;
                        foreach ($project_schedules as $project_schedule) {

                    ?>
                        <tr id="row<?php echo($i) ?>">  
                            <td style="display:none;"><?php echo($project_schedule["id_project_schedule"]) ?></td>
                            <td>
                                <select name="project_status" class="form-control">
                                        <option value="">Status</option>
                                        <option value="OFF" <?=$project_schedule['project_status'] == 'OFF' ? ' selected="selected"' : '';?>>OFF Duty (OFF) </option>
                                        <option value="OFJ" <?=$project_schedule['project_status'] == 'OFJ' ? ' selected="selected"' : '';?>>OFF dalam Perjalan (Crew Non Lokal) (OFJ)</option>
                                        <option value="ORC" <?=$project_schedule['project_status'] == 'ORC' ? ' selected="selected"' : '';?>>Operational Rate Potong Catering (ORC)</option>
                                        <option value="ORT" <?=$project_schedule['project_status'] == 'ORT' ? ' selected="selected"' : '';?>>Operational Rate Tanpa Potong Catering (ORT)</option>
                                        <option value="MVR" <?=$project_schedule['project_status'] == 'MVR' ? ' selected="selected"' : '';?>>Moving Rate (MVR)</option>
                                        <option value="MTR" <?=$project_schedule['project_status'] == 'MTR' ? ' selected="selected"' : '';?>>Maintenance Rate (MTR)</option>
                                        <option value="DK" <?=$project_schedule['project_status'] == 'DK' ? ' selected="selected"' : '';?>>Dinas Khusus (DK)</option>
                                        <option value="CT" <?=$project_schedule['project_status'] == 'CT' ? ' selected="selected"' : '';?>>Cuti (CT)</option>
                                        <option value="IZN" <?=$project_schedule['project_status'] == 'IZN' ? ' selected="selected"' : '';?>>Izin (IZN)</option>
                                </select>
                            </td>  
                            <td><input type="date" name="statusStartDate" class="form-control status-list" required="" value="<?php echo($project_schedule['start_date']) ?>" /></td> 
                            <td><input type="date" name="statusEndDate" class="form-control status-list" required="" value="<?php echo($project_schedule['end_date']) ?>" /></td> 
                            <?php if($i==0) : ?>
                                <td><button type="button" name="add" id="add" class="btn btn-success">Tambah Schedule</button></td>  
                            <?php else : ?>
                                <td><button type="button" name="remove" id="<?php echo($i) ?>" class="btn btn-danger btn_remove">X</button></td>
                            <?php endif ?>
                        </tr>  
                    <?php 
                    $i+=1;
                    }; ?>
                    <?php else: ?>
                        <tr>  
                            <td style="display:none;"></td>
                            <td>
                                <select name="status_lokasi" class="form-control">
                                        <option value="">Status</option>
                                        <option value="OFF">OFF Duty (OFF) </option>
                                        <option value="OFJ">OFF dalam Perjalan (Crew Non Lokal) (OFJ)</option>
                                        <option value="ORC">Operational Rate Potong Catering (ORC)</option>
                                        <option value="ORT">Operational Rate Tanpa Potong Catering (ORT)</option>
                                        <option value="MVR">Moving Rate (MVR)</option>
                                        <option value="MTR">Maintenance Rate (MTR)</option>
                                        <option value="DK">Dinas Khusus (DK)</option>
                                        <option value="CT">Cuti (CT)</option>
                                        <option value="IZN">Izin (IZN)</option>
                                </select>
                            </td>  
                            <td><input type="date" name="statusStartDate" class="form-control status-list" required="" /></td> 
                            <td><input type="date" name="statusEndDate" class="form-control status-list" required="" /></td> 
                            <td><button type="button" name="add" id="add" class="btn btn-success">Tambah Schedule</button></td>  
                        </tr>  
                    <?php endif; ?>
                    
                </table>  
                <input type="button" name="submit" id="submit" class="btn btn-info" value="Submit" />  
            </div>


        </form>  
    </div> 
    <script type='text/javascript'>
            $(document).ready(function() { 
                
                var i=1;  


                $('#add').click(function(){  
                    i++;  
                    $('#tableSchedule').append(
                        '<tr id="row'+i+'" class="dynamic-added">'+ 
                                '<td style="display:none;"></td>' +
                                '<td>' +
                                    '<select class="form-control" >'+
                                        '<option value="">Status</option>' +
                                        '<option value="OFF">OFF Duty (OFF) </option>' +
                                        '<option value="OFJ">OFF dalam Perjalan (Crew Non Lokal) (OFJ)</option>' +
                                        '<option value="ORC">Operational Rate Potong Catering (ORC)</option>' +
                                        '<option value="ORT">Operational Rate Tanpa Potong Catering (ORT)</option>' +
                                        '<option value="MVR">Moving Rate (MVR)</option>' +
                                        '<option value="MTR">Maintenance Rate (MTR)</option>' +
                                        '<option value="DK">Dinas Khusus (DK)</option>' +
                                        '<option value="CT">Cuti (CT)</option>' +
                                        '<option value="IZN">Izin (IZN)</option>' +
                                    '</select>' +
                                '</td> ' +
                                '<td><input type="date" name="statusStartDate" class="form-control status-list" required="" /></td>'+
                                '<td><input type="date" name="statusEndDate" class="form-control status-list" required="" /></td>'+
                            '<td><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button></td>'+
                        '</tr>');  
                });

                $(document).on('click', '.btn_remove', function(){  
                    var button_id = $(this).attr("id");   
                    $('#row'+button_id+'').remove();  
                });  
                
                $('#submit').click(function(){ 
                    var array = [];
                    var table = document.querySelector("table tbody");
                    var rows = table.children;
                    var project_schedules = {};
                    for (var i = 0; i < rows.length; i++) {
                        var fields = rows[i].children;
                        var rowArray = {};
                        var key = 0;
                        var project_status = fields[1].children[0];
                      
                        if(fields[0].innerHTML == ""){
                            var key = Math.random();
                        }else{
                            var key = fields[0].innerHTML;
                        }
                        console.log(key);
                        if(project_status.options[project_status.selectedIndex].value != ""){
                            project_schedules[key] = {
                                id_project_schedule : key,
                                project_nickname: "<?php echo($project_nickname) ?>",
                                project_status : project_status.options[project_status.selectedIndex].value,
                                start_date: fields[2].children[0].value,
                                end_date: fields[3].children[0].value
                            } 
                        }

                        
                    }
                    console.log(JSON.stringify(project_schedules));
                    $.post("<?=base_url()?>index.php/Rekapabsen/syncDatabase", 
                        { 
                            projectNickName: "<?php echo($project_nickname) ?>", 
                            project_schedules: JSON.stringify(project_schedules) })
                    .done(function( data ) {
                        alert("Saved");
                    });
                });




            }); 
		 
		</script>       
</html>