<div class="panel-body">
    <div class="form-horizontal">
        <div class="row">
            <div class="col-md-8">

                {!! Form::token() !!}
                <div class="form-group">
                    {!! Form::label('name','نام', ['class'=>'control-label col-md-3']) !!}

                    <div class="col-md-8">
                        {!! Form::text('name',null,['id'=>'name','class'=>'form-control']) !!}

                    </div>
                </div>
                <div class="form-group">
                    {!! Form::label('company','نام شرکت', ['class'=>'control-label col-md-3']) !!}

                    <div class="col-md-8">
                        {!! Form::text('company',null,['id'=>'company','class'=>'form-control']) !!}

                    </div>
                </div>

                <div class="form-group">
                    {!! Form::label('email','ایمیل', ['class'=>'control-label col-md-3']) !!}

                    <div class="col-md-8">
                        {!! Form::email('email',null,['id'=>'email','class'=>'form-control']) !!}

                    </div>
                </div>
                <div class="form-group">
                    {!! Form::label('phone','شماره تماس', ['class'=>'control-label col-md-3']) !!}

                    <div class="col-md-8">
                        {!! Form::text('phone',null,['id'=>'phone','class'=>'form-control']) !!}

                    </div>
                </div>
                <div class="form-group">
                    {!! Form::label('address','آدرس', ['class'=>'control-label col-md-3']) !!}

                    <div class="col-md-8">
                        {!! Form::textarea('address',null,['id'=>'address','class'=>'form-control', 'rows'=>3]) !!}

                    </div>
                </div>

                <div class="form-group">
                    {!! Form::label('group_id','گروه',['class'=>'control-label col-md-3']) !!}

                    <div class="col-md-5">
                        {!! Form::select('group_id',[]+$groups,null, ['placeholder' => 'گروه مورد نظر را انتخاب کنید...','class'=>'form-control']) !!}

                    </div>
                    <div class="col-md-4">
                        <a href="#" id="add-group-btn" class="btn btn-default btn-block">Add Group</a>
                    </div>
                </div>
                <div class="form-group" id="add-new-group">
                    <div class="col-md-offset-3 col-md-8">
                        <div class="input-group">
                            <input type="text" name="new_group" id="new_group" class="form-control">
                            <span class="input-group-btn">
                            <a href="#" id="add-new-btn" class="btn btn-default">
                              <i class="glyphicon glyphicon-ok"></i>
                            </a>
                          </span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="fileinput fileinput-new" data-provides="fileinput">
                    <div class="fileinput-new thumbnail" style="width: 150px; height: 150px;">
                        <img   src="/images/{{!empty($contact->photo)?$contact->photo:''}}" alt="{{!empty($contact->name)?$contact->name:''}}">
                    </div>
                    <div class="fileinput-preview fileinput-exists thumbnail"
                         style="max-width: 200px; max-height: 150px;"></div>
                    <div class="text-center">
                                    <span class="btn btn-default btn-file"><span
                                                class="fileinput-new">انتخاب تصویر</span><span class="fileinput-exists">Change</span>{!! Form::file('photo') !!}</span>
                        <a href="#" class="btn btn-default fileinput-exists"
                           data-dismiss="fileinput">Remove</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="panel-footer">
    <div class="row">
        <div class="col-md-8">
            <div class="row">
                <div class="col-md-offset-3 col-md-6">
                    {!! Form::submit(empty($contact->id)?'ذخیره':'بروزرسانی', ['class'=>'btn btn-primary']) !!}
                    {!! Form::reset('انصراف',['class'=>'btn btn-default']) !!}

                </div>
            </div>
        </div>
    </div>
</div>
@section('footer')
    <script>
        $("#add-new-group").hide();
        $('#add-group-btn').click(function () {
            $("#add-new-group").slideToggle(function () {
                $('#new_group').focus();
            });
            return false;
        });

        $('#add-new-btn').click(function () {
            var newGroup = $('#new_group');
            var inputGroup = newGroup.closest('.input-group');


            $.ajax({
                url:"{{route('groups.store')}}",
                method: 'post',
                data:{
                    name:$('#new_group').val(),
                    _token:$("input[name=_token]").val()
                },
                success:function (group) {
                    if(group.id != null){
                        inputGroup.removeClass('has-error');
                        inputGroup.next('.text-danger').remove();
                    var newOption = $('<option></option>')
                        .attr('value', group.id)
                        .attr('selected', true)
                        .text(group.name);

                        $("select[name=group_id]")
                            .append(newOption);

                        newGroup.val("");
                    }
                },
                error:function (xhr) {
                    var errors = xhr.responseJSON;

                    var error = errors.name[0];
                    if(error){

                        inputGroup.next('.text-danger').remove();

                        inputGroup
                            .addClass('has-error')
                            .after('<p class="text-danger">'+error+'</p>');
                    }
                }
            });
        });
    </script>

@endsection