@extends('dashboard')

@section('content')
<div style="display:flex; min-height:100vh;">

    <!-- Konten utama -->
    <div style="flex:1; padding:30px; background:#f9fafb;">
        <h1 style="margin-bottom:20px;">📊 Dashboard</h1>

        <!-- Summary Cards -->
        <div style="display:flex; gap:20px; margin-bottom:30px;">
            
        </div>

        <!-- Table Users -->
        <div style="background:#fff; padding:20px; border-radius:10px; box-shadow:0 0 10px rgba(0,0,0,0.05);">
            <h3>List Users</h3>
            <table style="width:100%; border-collapse:collapse; margin-top:15px;">
                <thead>
                    <tr style="background:#f3f4f6;">
                        <th style="padding:10px; border:1px solid #e5e7eb;">ID</th>
                        <th style="padding:10px; border:1px solid #e5e7eb;">Sender</th>
                        <th style="padding:10px; border:1px solid #e5e7eb;">Receiver</th>
                        <th style="padding:10px; border:1px solid #e5e7eb;">Created At</th>
                    </tr>
                </thead>
                
            </table>
        </div>

    </div>
</div>
@endsection
