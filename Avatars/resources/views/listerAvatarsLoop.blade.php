<tr>
    <th><img src="{{ route('downloadAvatar', ['email' => $avatar['email']]) }}" /></th>
    <th>{{$avatar['email']}}</th>
    <th><a href="{{route('deleteAvatar', ['email' => $avatar['email']])}}">X</a></th>
</tr>

