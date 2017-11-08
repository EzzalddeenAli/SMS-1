@extends('dashboard.layouts.main')

@section('title', 'Student Dashboard')

@section('sidebar')
    @include('dashboard.student.sidebar')
@endsection

@section('body')
    <div class="row">
        <p class="text-center h3">CERTIFICATE OF REGISTRATION & CLEARANCE</p>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="table-responsive">
                <table class="table table-bordered table-hover">
                    <thead>
                    <tr>
                        <th>CASH BASIS</th>
                        <th>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</th>
                        <th>OR#-DATE</th>
                        <th colspan="5" class="text-center">TUITION FEE <samp>
                                &nbsp; &nbsp; Plan &nbsp; A <i class="fa fa-square-o"></i>
                                &nbsp; &nbsp; B <i class="fa fa-square-o"></i> &nbsp; &nbsp; C <i class="fa fa-square-o"></i>
                                &nbsp; &nbsp; D <i class="fa fa-square-o"></i> &nbsp; &nbsp; E <i class="fa fa-square-o"></i></samp></th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>TUITION FEE</td>
                        <td></td>
                        <td></td>
                        <td class="text-center"><b>MONTH</b></td>
                        <td class="text-center"><b>AMOUNT</b></td>
                        <td class="text-center"><b>OR No.</b></td>
                        <td class="text-center"><b>DATE</b></td>
                        <td class="text-center"><b>SIGNATURE</b></td>
                    </tr>
                    <tr>
                        <td>MISCELLANEOUS</td>
                        <td></td>
                        <td></td>
                        <td>June <b class="pull-right">P</b></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>OTHERS:</td>
                        <td></td>
                        <td></td>
                        <td>July</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td>August</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td>September</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td>October</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td><b>INSTALLMENT BASIS</b></td>
                        <td></td>
                        <td></td>
                        <td>November</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>DOWNPAYMENT</td>
                        <td></td>
                        <td></td>
                        <td>December</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>DEVELOPMENT FEE</td>
                        <td></td>
                        <td></td>
                        <td>January</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>BOOKS AND NOTEBOOKS</td>
                        <td></td>
                        <td></td>
                        <td>February</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>TOTAL <b class="pull-right">P</b></td>
                        <td></td>
                        <td></td>
                        <td class="text-right"><b>P</b></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection