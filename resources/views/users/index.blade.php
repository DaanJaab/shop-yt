@extends('layouts.app')

@section('content')
<div class="container">
<table class="table table-hover">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Email</th>
        <th scope="col">Imię</th>
        <th scope="col">Nazwisko</th>
        <th scope="col">Numer telefonu</th>
        <th scope="col">Akcje</th>
      </tr>
    </thead>
    <tbody>
        @foreach($users as $user)
        <tr>
            <th scope="row">{{ $user->id }}</th>
            <td>{{ $user->email }}</td>
            <td>{{ $user->name }}</td>
            <td>{{ $user->surname }}</td>
            <td>{{ $user->phone_number }}</td>
            <td>
                <button class="btn btn-danger btn-sm delete" data-id="{{ $user->id }}">
                    X
                </button>
            </td>
        </tr>
        @endforeach
    </tbody>
  </table>
  {{ $users->links() }}
</div>
@endsection
@section('javascript')
    const deleteUrl = "{{ url('users') }}/";
    const confirmDeleteMsg = "{{ __('shop.messages.delete_confirm') }}";
    const confirmDeleteDescMsg = "{{ __('shop.messages.delete_description') }}";
    const confirmDeleteButton = "{{ __('shop.button.delete_confirm') }}";
    const cancelDeleteButton = "{{ __('shop.button.delete_cancel') }}";
    const deletedMsg = "{{ __('shop.messages.deleted') }}";
    const somethingWrongMsg = "{{ __('shop.messages.something_wrong') }}";
@endsection
@section('js-files')
    <script src="{{ asset('js/delete.js') }}"></script>
@endsection
