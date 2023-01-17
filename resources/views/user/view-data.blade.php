<div class="col-md-12">
    <div class="table-responsive">
        <table class="table table-borderless">
            <tr><td width="30%"><b>Username</b></td><td><b>:</b></td><td>{{ $user->username }}</td></tr>
            <tr><td width="30%"><b>Role</b></td><td><b>:</b></td><td>{{ $user->role->role_name }}</td></tr>
            <tr><td width="30%"><b>Status</b></td><td><b>:</b></td><td>{!! STATUS_LABEL[$user->status] !!}</td></tr>
            <tr><td width="30%"><b>Account Deletable</b></td><td><b>:</b></td><td>{!! DELETABLE_LABEL[$user->deletable] !!}</td></tr>
    </div>
</div>
