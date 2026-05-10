@extends('app')

<style>
body {
    background-color: black;
    color: white;
    font-family: Arial, sans-serif;
}

.admin-container {
    width: 90%;
    margin: 50px auto;
}

.admin-card {
    background-color: #1a1a1a;
    padding: 20px;
    margin-bottom: 20px;
    border-radius: 10px;
    box-shadow: 0 0 10px crimson;
}

.admin-card h3 {
    margin-bottom: 10px;
}

.button-group {
    margin-top: 15px;
}

.approve-btn {
    background-color: green;
    color: white;
    border: none;
    padding: 10px 15px;
    margin-right: 10px;
    border-radius: 5px;
    cursor: pointer;
}

.reject-btn {
    background-color: crimson;
    color: white;
    border: none;
    padding: 10px 15px;
    border-radius: 5px;
    cursor: pointer;
}

.approve-btn:hover {
    background-color: darkgreen;
}

.reject-btn:hover {
    background-color: darkred;
}
</style>

@section('content')

<div class="admin-container">

    <h1>Pending Admin Approvals</h1>

    @if(session('success'))
        <p style="color: lightgreen;">
            {{ session('success') }}
        </p>
    @endif

    @forelse($pendingAdmins as $admin)

        <div class="admin-card">

            <h3>
                {{ $admin->fname }} {{ $admin->lname }}
            </h3>

            <p>Email: {{ $admin->email }}</p>

            <p>Date of Birth: {{ $admin->date_of_birth }}</p>

            <div class="button-group">

                <form action="{{ route('admin.approve', $admin->user_id) }}"
                      method="POST"
                      style="display:inline;">
                    @csrf

                    <button type="submit" class="approve-btn">
                        Approve
                    </button>
                </form>

                <form action="{{ route('admin.reject', $admin->user_id) }}"
                      method="POST"
                      style="display:inline;">
                    @csrf

                    <button type="submit" class="reject-btn">
                        Reject
                    </button>
                </form>

            </div>

        </div>

    @empty

        <p>No pending admin accounts.</p>

    @endforelse

</div>

@endsection