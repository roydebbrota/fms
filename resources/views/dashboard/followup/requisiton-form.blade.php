<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="{{asset('assets/css/dashlite.css?ver=1.9.2')}}">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.6.5/css/buttons.bootstrap4.min.css">
    <link id="skin-default" rel="stylesheet" href="{{asset('assets/css/theme.css?ver=1.9.2')}}">
  </head>
  <body>
    <div class="nk-block-head-content  mb-5">
        <h4 class="nk-block-title text-center">Modhucity</h4><br>
        <h4 class="nk-block-title text-center"><u>VEHICLE REQUATION</u></h4>
    </div>



    <div class="mt-5">
        <div class="row mb-3">
            <label for="emp_name" class="col-md-2 col-form-label  mb-3"><span class="pl-4"> Name:</span></label>
            <div class="col-md-4  mb-3">
                <input value="{{ $req['emp_name'] }}" type="text" class="form-control" id="emp_name" name="emp_name" readonly>
            </div>

            <label for="designation" class="col-md-2 col-form-label  mb-3 text-center"><span class="pl-4"> Designation :</span></label>
            <div class="col-md-4  mb-3">
                <input value="{{ $req['designation']?? '' }}" type="text" class="form-control" id="designation" name="designation" readonly>
            </div>

            <label for="mobile_number" class="col-md-2 col-form-label  mb-3"><span class="pl-4"> Mobile Number :</span></label>
            <div class="col-md-4  mb-3">
                <input value="{{ $req['mobile_number']?? '' }}" type="text" class="form-control" id="mobile_number" name="mobile_number" readonly>
            </div>

            <label for="team" class="col-md-2 col-form-label  mb-3 text-center"><span class=""> Team :</span></label>
            <div class="col-md-4  mb-3">
                <input value="{{ $req['team']?? '' }}" type="text" class="form-control" id="team" name="team" readonly>
            </div>
            <label for="starting_time" class="col-md-2 col-form-label  mb-3"><span class="pl-4">Starting Time :</span></label>
            <div class="col-md-4  mb-3">
                <input type="text" value="{{ $req['starting_time']?? '' }}" class="form-control time-picker" id="starting_time" name="starting_time"  readonly>
            </div>

            <label for="back_time" class="col-md-2 col-form-label  mb-3 text-center"><span class="pl-4"> Back Time :</span></label>
            <div class="col-md-4  mb-3">
                <input value="{{ $req['back_time']?? '' }}" type="text" class="form-control time-picker" id="back_time" name="back_time"readonly>
            </div>


            {{-- <label for="requisition_date" class="col-md-2 col-form-label  mb-3"><span class="pl-4">Requisition Date:</span></label>
            <div class="col-md-4  mb-3">
                <input type="text" class="form-control" id="requisition_date" name="requisition_date" readonly>
            </div> --}}

            <label for="requisition_date" class="col-md-2 col-form-label  mb-3 "><span class="pl-4"> Visit Date :</span></label>
            <div class="col-md-4  mb-3">
                <input value="{{ $req['requisition_date']?? '' }}" type="text" class="form-control" id="requisition_date" name="requisition_date" readonly>
            </div>

            {{-- <label for="lead_id" class="col-md-2 col-form-label  mb-3"><span class="pl-4"> Lead ID :</span></label>
            <div class="col-md-4  mb-3">
                <input type="text" class="form-control" id="lead_id" name="lead_id" readonly>
            </div> --}}
        </div>
    </div>
    <table class="table">
        <thead>
            <tr>
                <th class="border text-center">Name of Project</th>
                <th class="border text-center">Number Of Person</th>
                <th class="border text-center">Staff Pick Up Place</th>
                <th class="border text-center">Client Pick Up Place</th>
            </tr>
        </thead>
        <tbody>
            <tr class="">

                <td class="border text-center" style="padding-bottom:80px">
                    {{ $req['project_id']?? '' }}
                </td>

                <td class="border text-center">
                    {{ $req['number_of_person']?? '' }}
                </td>

                <td class="border text-center">
                    {{ $req['staff_pick_up_place']?? '' }}
                </td>

                <td class="border text-center">
                    {{ $req['client_pick_up_place']?? '' }}
                </td>

            </tr>
            <tr>
                <td class="text-center" style="padding-top: 200px">
                    <b>Submitted By</b>
                </td>
                <td class="text-center" style="padding-top: 200px">
                    <b>Team Leader</b>
                </td>
                <td class="text-center" style="padding-top: 200px">
                  <b>Checked By</b>
                </td>
                <td class="text-center" style="padding-top: 200px">
                 <b>Approved By</b>
                </td>
            </tr>
        </tbody>
    </table>
  </body>
</html>
