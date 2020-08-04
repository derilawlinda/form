
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
                                <span class="invalid-feedback"> Required </span>
                            </td>  
                            <td><input type="date" name="statusStartDate" class="form-control status-list" required value="<?php echo($project_schedule['start_date']) ?>" />
                            <div class="invalid-feedback">Tidak bisa lebih besar dari end date</div></td> 
                            <td><input type="date" name="statusEndDate" class="form-control status-list" required value="<?php echo($project_schedule['end_date']) ?>" />
                            <div class="invalid-feedback">Tidak bisa lebih kecil dari start date</div>
                            </td> 
                            <?php if($i==0) : ?>
                                <td><button type="button" name="add" id="add" class="btn-sm btn-success"><span class="fa fa-plus" aria-hidden="true"></span></button>
                                <span class="badge badge-secondary badge-danger" style="display:none;" id="danger<?php echo($i) ?>" >Overlapping Date</span>
                            </td>  
                            <?php else : ?>
                                <td><button type="button" name="remove" id="<?php echo($i) ?>" class="btn-sm btn-danger btn_remove"><span class="fa fa-times" aria-hidden="true"></span></button>
                                <span class="badge badge-secondary badge-danger" style="display:none;" id="danger<?php echo($i) ?>">Overlapping Date</span></td>
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
                                <span class="invalid-feedback"> Required </ span>
                            </td>  
                            <td><input type="date" name="statusStartDate" class="form-control status-list" required />
                            <div class="invalid-feedback">Tidak bisa lebih besar dari tanggal akhir</div>
                            </td> 
                            <td><input type="date" name="statusEndDate" class="form-control status-list" required />
                            <div class="invalid-feedback">Tidak bisa lebih kecil dari tanggal mulai</div>
                            </td> 
                            <td><button type="button" name="add" id="add" class="btn-sm btn-success"><span class="fa fa-plus" aria-hidden="true"></span></button>
                            <span class="badge badge-secondary badge-danger" style="display:none;" id="danger0">Overlapping Date</span>
                        </td>  
                        </tr>  
                    <?php endif; ?>
                    
                </table>  
                <input type="button" name="submit" id="submit" class="btn btn-info" value="Submit" disabled />  
            </div>


        </form>  
    </div> 
    <script type='text/javascript'>
            $(document).ready(function() { 
                var is_valid = false;
                var i=<?php echo($i+1) ?>; 
                 


                $('#add').click(function(){  
                    i++;  
                    $('#tableSchedule').append(
                        '<tr id="row'+i+'" class="dynamic-added">'+ 
                                '<td style="display:none;"></td>' +
                                '<td>' +
                                    '<select class="form-control is-invalid" >'+
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
                                    '<span class="invalid-feedback"> Required </ span>'+
                                '</td> ' +
                                '<td><input type="date" name="statusStartDate" class="form-control status-list date_input is-invalid" required /><div class="invalid-feedback">Required</div>'+
                                '</td>'+
                                '<td><input type="date" name="statusEndDate" class="form-control status-list date_input is-invalid" required /><div class="invalid-feedback">Required</div></td>'+
                            '<td><button type="button" name="remove" id="'+i+'" class="btn-sm btn-danger btn_remove"><span class="fa fa-times" aria-hidden="true"></span></button>'+
                                '<span class="badge badge-secondary badge-danger ml-1" style="display:none;" id="danger'+i+'">Overlapping Date</span>' + 
                            '</td>'+
                        '</tr>');
                        validate();  
                });

                $(document).on('click', '.btn_remove', function(){  
                    var button_id = $(this).attr("id");   
                    $('#row'+button_id+'').remove();
                    validate();  
                });

                $(document).on('change', 'td > select', function(){  
                    
                    if($(this).val() == ""){
                        $(this).addClass("is-invalid");
                    }else {
                        $(this).removeClass("is-invalid");
                    }
                    validate();
                });

                $(document).on('change', 'input[type="date"]', function(){


                    var table = document.querySelector("table tbody");
                    var rows = table.children;
                    var dates = [];
                    var rowid = [];
                    $(".badge-danger").hide();
                    if($(this).val() == ""){
                        var nearestValidateText = $(this).closest('td').find('.invalid-feedback');
                        nearestValidateText.text("Required");
                        $(this).addClass("is-invalid");
                    }else {
                        $(this).removeClass("is-invalid");
                    }

                    if($(this).attr('name') == "statusStartDate"){
                        var nearestValidateText = $(this).closest('td').find('.invalid-feedback');
                        nearestValidateText.text("Tidak bisa lebih besar dari tanggal akhir");
                        var nearestElementStatusEndDate = $(this).closest('tr').find('input[name="statusEndDate"]');
                        if(nearestElementStatusEndDate.val() != ""){
                            if(new Date($(this).val()) > new Date(nearestElementStatusEndDate.val())){
                               
                                $(this).addClass("is-invalid");
                            }else{
                                $(this).removeClass("is-invalid");
                                nearestElementStatusEndDate.removeClass("is-invalid");
                            }
                        }
                    }

                    if($(this).attr('name') == "statusEndDate"){
                        
                        var nearestValidateText = $(this).closest('td').find('.invalid-feedback');
                        nearestValidateText.text("Tidak bisa lebih kecil dari tanggal awal");
                        var nearestElementStatusStartDate = $(this).closest('tr').find('input[name="statusStartDate"]');
                        if(nearestElementStatusStartDate.val() != ""){
                            if(new Date($(this).val()) < new Date(nearestElementStatusStartDate.val())){
                                $(this).addClass("is-invalid");
                            }else{
                                $(this).removeClass("is-invalid");
                                nearestElementStatusStartDate.removeClass("is-invalid");
                            }
                        }
                    }

                    for (var i = 0; i < rows.length; i++) {
                        rowid.push(rows[i].id.replace("row",""))
                        var fields = rows[i].children;
                        dates.push(fields[2].children[0].value);
                        dates.push(fields[3].children[0].value);
                    }
                    multipleDateRangeOverlaps(dates,rowid);
                    validate();
                });

            

                function dateRangeOverlaps(a_start, a_end, b_start, b_end) {
                    if (a_start <= b_start && b_start <= a_end) return true; // b starts in a
                    if (a_start <= b_end   && b_end   <= a_end) return true; // b ends in a
                    if (b_start <  a_start && a_end   <  b_end) return true; // a in b
                    return false;
                }

                function multipleDateRangeOverlaps(arguments, arrayrowId) {
                    var i, j;
                    if (arguments.length % 2 !== 0)
                        throw new TypeError('Arguments length must be a multiple of 2');
                    
                    for (i = 0; i < arguments.length - 2; i += 2) {
                            var rowindex = i/2;
                            var rowId = arrayrowId[rowindex];
                        for (j = i + 2; j < arguments.length; j += 2) {
                            
                            if (
                                dateRangeOverlaps(
                                    new Date(arguments[i]), new Date(arguments[i+1]),
                                    new Date(arguments[j]), new Date(arguments[j+1])
                                )
                            ){
                                if(i != 0){
                                    $("#danger"+rowId).show();
                                }else{
                                    $("#danger0").show();
                                }
                            }
                        }
                    }
                    
                    return false;
                }

                function validate(){
                   
                    if($('.is-invalid').length === 0 && $('.badge-danger:visible').length === 0){
                        is_valid = true;
                    }else{
                        is_valid = false;
                    }
                    console.log(is_valid);
                    if(is_valid){
                        $("#submit").prop("disabled", false);
                    }else{
                        $("#submit").prop("disabled", true);
                    }
                }

                validate();

                
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