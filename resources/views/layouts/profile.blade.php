<div class="card card-profile" style="margin-bottom: 0px;">
    <div class="card-header">
      <div class="profile-picture">
        <div class="avatar avatar-xl" style="width: 7rem;height: 7rem;">
          <img src="{{ asset('img/profile_images/user.png') }}" id="profile_user_image" alt="Profile image" class="avatar-img rounded-circle">
        </div>
      </div>
    </div>
    <div class="card-body">
      <div class="user-profile text-center">
        <div class="name">{{ $user['name'].' '.$user['lastname'] }}</div>
        <div class="job">
           Perfil: {{ $roles }} {{--{{ __('roles.'.$role) }} --}}
        </div>
        <div class="job"> Identificación: {{ $user['document_id'] }} </div>
        <div class="job"> ID cuenta: {{ $user['account'] }} </div>
        <div class="desc">Fecha registro: {{ $user['created_at'] }}</div>
        
      </div>
    </div>
    <hr style="margin-right: 15px;margin-left: 14px;">
    <div class="card-footer">
      <div class="row user-stats text-center" style="font-size: 12px;">
        <div class="col">
          <div class="number"><i class="fas fa-phone"></i></div>
          <div class="title">{{ $user['mobile'] ?? 'No registrado'}}</div>
        </div>
        <div class="col">
          <div class="number"><i class="fas fa-envelope"></i></div>
          <div class="title">{{ $user['email'] }}</div>
        </div>
        <div class="col">
          <div class="number"><i class="fas fa-building"></i></div>
          <div class="title">{{ $user['city'] ?? 'No registrado' }}</div>
        </div>
      </div>
    </div>
</div>