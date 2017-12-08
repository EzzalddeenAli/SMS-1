
<!-- title row -->
<div class="row">
    <div class="col-xs-12">
        <h2 class="page-header">
            <i class="fa fa-globe"></i> JILCS TANAUAN
        </h2>
    </div>
    <!-- /.col -->
</div>
<!-- info row -->
<div class="row invoice-info">
    <div class="col-sm-4 invoice-col">
        <address>
            <strong>School Name:</strong><br>
            {{ $school_info->school_name }}<br>
            <strong>Address:</strong><br>
            {{ $school_info->address }} {{ $school_info->city }} {{ $school_info->state }} <br>
            <strong>Zip:</strong><br>
            {{ $school_info->zip }}<br>
        </address>
    </div>
    <!-- /.col -->
    <div class="col-sm-4 invoice-col">
        <address>
            <strong>Administrator:</strong><br>
            {{ $school_info->administrator }} <br>
            <strong>Phone:</strong><br>
            {{ $school_info->phone }} <br>
            <strong>Website:</strong><br>
            {{ $school_info->website }} <br>
        </address>
    </div>
    <!-- /.col -->
    <div class="col-sm-4 invoice-col">
        <address>
            <strong>Email:</strong><br>
            {{ $school_info->email }} <br>
            <strong>Short Name:</strong><br>
            {{ $school_info->short_name }} <br>
            <strong>School Number:</strong><br>
            {{ $school_info->school_number }} <br>
        </address>
    </div>
    <!-- /.col -->
</div>
<!-- /.row -->

<!-- this row will not appear when printing -->
<div class="row no-print">
    <div class="col-xs-12">
        <a href="#" target="_blank" class="btn btn-default"><i class="fa fa-print"></i> Print</a>
    </div>
</div>
