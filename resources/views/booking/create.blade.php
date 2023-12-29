<!DOCTYPE html>
<html lang="en">
<head>
  <title>Create Booking </title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>

<div class="container mt-3">
  <h2>Stacked form</h2>
  <form action="{{ route('booking.store') }}" method="post">
  {{ csrf_field() }}
    <div class="mb-3 mt-3">
      <label for="date">Date</label>
      <input type="text" class="form-control" id="text" placeholder="Enter Date" name="date">
    </div>
    <label for="sel1" class="form-label">Select Hotel (select one):</label>
    <select class="form-select" id="sel1" name="hotel_id">
    <option display selected>choose the hotel</option>
    @foreach($hotels as $hotel)
      <option value='{{$hotel->id}}'>{{$hotel->id}}-{{$hotel->name}}</option>
      @endforeach
    </select>
    <label for="sel1" class="form-label">Select Customer (select one):</label>
    <select class="form-select" id="sel1" name="customer_id">
    <option display selected>choose the customer</option>
    @foreach($customers as $customer)
      <option value='{{$customer->id}}'>{{$customer->id}}-{{$customer->name}}</option>
      @endforeach
    </select>
    <label for="sel1" class="form-label">Select Ticket (select one):</label>
    <select class="form-select" id="sel1" name="ticket_id">
    <option display selected>choose the ticket</option>
    @foreach($tickets as $ticket)

      <option value='{{$ticket->id}}'>{{$ticket->id}}</option>
      @endforeach
    </select><br>
    <button type="submit" class="btn btn-primary">Save</button>
    <h3> <a href="{{route('booking.index')}}"class=" btn btn-secondary">Back</a></h3>
  </form>
</div>

</body>
</html>

      
        


 
   



