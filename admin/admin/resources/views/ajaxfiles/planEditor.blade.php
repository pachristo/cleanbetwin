

<form action="#" id="planUpdater" method="post">
    <div class="form-group col-sm-6">
        <label for="">Sub. Name</label>
        <input type="hidden" name="id" value="{{$plan->id}}">
        <input type="text" class="form-control" name="plan" required placeholder="Subscription Name" value="{{$plan->planName}}">
    </div>

    <div class="form-group col-sm-6">
        <label for="">Access Time <small class="text-danger">Please, PAY ATTENTION!</small></label>
        <input type="text" class="form-control" name="accessTime" required placeholder="Subscription Access Time" value="{{$plan->accessTime}}">
    </div>

    <div class="form-group col-sm-6">
        <label for="">KSH Price <span class="text-danger"><strong>(KSH)</strong></span></label>
        <input type="number" name="keshPrice" placeholder="Kenya Shilling Price Value" required class="form-control" value="{{$plan->keshPrice}}">
    </div>

    <div class="form-group col-sm-6">
        <label for="">Naira Price <span class="text-danger"><strong>(N)</strong></span></label>
        <input type="number" name="nairaPrice" placeholder="Naira Price Value" required class="form-control" value="{{$plan->nairaPrice}}">
    </div>

    <div class="form-group col-sm-6">
        <label for="">Dollar Price <span class="text-danger"><strong>($)</strong></span></label>
        <input type="number" name="dollarPrice" placeholder="Dollar Price Value" required class="form-control" value="{{$plan->dollarPrice}}">
    </div>

     <div class="form-group col-sm-6">
        <label for="">CED Price <span class="text-danger"><strong>(CED)</strong></span></label>
        <input type="number" name="cedPrice" placeholder="Ghana Price Value" required class="form-control" value="{{$plan->cedPrice}}">
    </div>

    <div class="form-group col-sm-6">
        <label for="">TZS Price <span class="text-danger"><strong>(TZS)</strong></span></label>
        <input type="number" name="tzsPrice" placeholder="Tanzania Price Value" required class="form-control" value="{{$plan->tzsPrice}}">
    </div>

    <div class="form-group col-sm-6">
        <label for="">ZMW Price <span class="text-danger"><strong>(ZMW)</strong></span></label>
        <input type="number" name="zmwPrice" placeholder="Zambia Price Value" required class="form-control" value="{{$plan->zmwPrice}}">
    </div>

    <div class="form-group col-sm-6">
        <label for="">ZAR Price <span class="text-danger"><strong>(ZAR)</strong></span></label>
        <input type="number" name="zarPrice" placeholder="South Africa Price Value" required class="form-control" value="{{$plan->zarPrice}}">
    </div>

    <div class="form-group col-sm-6">
        <label for="">UGX Price <span class="text-danger"><strong>(UGX)</strong></span></label>
        <input type="number" name="ugxPrice" placeholder="Uganda Price Value" required class="form-control" value="{{$plan->ugxPrice}}">
    </div>
    <div class="form-group col-sm-6">
        <label for="">Odds <span class="text-danger"><strong>(Game Odds)</strong></span></label>
        <input type="text" name="odds" placeholder="Odds" required class="form-control" value="{{$plan->odds}}">
    </div>
       <div class="form-group col-sm-12">
        <label for="">Plan Benefit </label>
        <textarea type="text" name="planBenefits" class=" form-control" placeholder="Plan Benefits" required > {{$plan->planBenefits}}</textarea> 
    </div>


    <div id="planstatus" class="col-xs-12"></div>

    {{ csrf_field() }}
    <div class="col-sm-12 form-group">
        <button class="btn btn-md btn-success" name="submit" id="planbtn">SAVE UPDATE</button>
    </div>
</form>

<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $(document).ready(function () {

        $('#planUpdater').submit(function (e) {
            e.preventDefault();
            $('#planstatus').html('Updating... Please wait');
            $('#planbtn').prop('disabled', true);

            var dataString = $(this).serialize();
            $.ajax({
                type: "POST",
                url: "planUpdater",
                data: dataString,
                dataType: "JSON",
                success: function(data){
                    if (data.status == 1) {
                        $('#planbtn').prop('disabled', false);
                        $('#planstatus').html(data.encounters);
                    }
                    else{
                       // alert(data.encounters);
                        $('#planbtn').prop('disabled', false);
                        $('#planstatus').html('');
                        $('#planUpdater')[0].reset();
                        swal('Plans Updated SUCCESSFULLY');
                        $('#planEditor').modal('hide');
                        location.reload();
                    }
                }
            });
        });

    });
</script>