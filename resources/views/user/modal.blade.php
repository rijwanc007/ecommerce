<div class="modal fade" id="store_or_update_modal" tabindex="-1" role="dialog" aria-labelledby="model-1" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header bg-primary">
          <h3 class="modal-title text-white" id="model-1"></h3>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><i aria-hidden="true" class="ki ki-close text-white"></i></button>
        </div>
        <form id="store_or_update_form" method="post">
          @csrf
            <div class="modal-body">
                <div class="row">
                    <input type="hidden" name="update_id" id="update_id"/>
                    <x-form.textbox labelName="Username" name="username" required="required" col="col-md-6" placeholder="Enter username"/>
                    <x-form.selectbox labelName="Role" name="role_id" required="required" col="col-md-6" class="selectpicker">
                        @foreach ($roles as $role)
                            <option value="{{ $role->id }}">{{ $role->role_name }}</option>
                        @endforeach
                    </x-form.selectbox>
                    <div class="col-md-6 form-group">
                        <label for="site_title">Password</label>
                        <div class="input-group">
                            <input type="password" class="form-control bg-brand" name="password" id="password">
                            <div class="input-group-prepend">
                                <span class="input-group-text bg-warning" id="generate_password" style="border:0;cursor: pointer;" data-toggle="tooltip" data-theme="dark" title="Generate Password">
                                    <i class="fas fa-lock text-white"></i>
                                </span>
                            </div>
                            <div class="input-group-prepend">
                                <span class="input-group-text bg-primary" style="border-top-right-radius: 0.42rem;border-bottom-right-radius: 0.42rem;border:0;">
                                    <i class="fas fa-eye toggle-password text-white" toggle="#password" style="cursor: pointer;"></i>
                                </span>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 form-group">
                        <label for="site_title">Confirm Password</label>
                        <div class="input-group">
                            <input type="password" class="form-control bg-brand" name="password_confirmation" id="password_confirmation">
                            <div class="input-group-prepend">
                                <span class="input-group-text bg-primary" style="border-top-right-radius: 0.42rem;border-bottom-right-radius: 0.42rem;border:0;">
                                    <i class="fas fa-eye toggle-password text-white" toggle="#password_confirmation" style="cursor: pointer;"></i>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary btn-sm" id="save-btn"></button>
            </div>
        </form>
      </div>
    </div>
  </div>
