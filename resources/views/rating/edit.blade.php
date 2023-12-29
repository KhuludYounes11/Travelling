<!DOCTYPE html>
<html lang="en">
<head>
  <title>Edit Rating </title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>

<div class="container mt-3">
  <h2>Stacked form</h2>
  @foreach($rating as $rating)
  <form action=" {{route('rating.update',$rating->id)}}" method="post">
  {{ csrf_field() }}
    <div class="mb-3 mt-3">
      <label for="date">Star</label>
      <input type="text" class="form-control" id="text" placeholder="Enter Star" value='{{$rating->star}}' name="star">
    </div>
    <div class="mb-3 mt-3">
      <label for="date">Comment</label>
      <input type="text" class="form-control" id="text" placeholder="Enter Comment " value='{{$rating->comment}}' name="comment">
    </div>
    <label for="sel1" class="form-label">Select Hotel (select one):</label>
    <select class="form-select" id="sel1" name="hotel_id">
    <option display selected>{{$rating->hotel_id}}</option>
    @foreach($hotels as $hotel)
      <option value='{{$hotel->id}}'>{{$hotel->id}}-{{$hotel->name}}</option>
      @endforeach
    </select>
    <label for="sel1" class="form-label">Select Customer (select one):</label>
    <select class="form-select" id="sel1" name="customer_id">
    <option display selected>{{$rating->customer_id}}</option>
    @foreach($customers as $customer)
      <option value='{{$customer->id}}'>{{$customer->id}}-{{$customer->name}}</option>
      @endforeach
    </select>
   <br>
    <button type="submit" class="btn btn-primary">Update</button>
  </form>
</div>

</body>
</html>

      
        


 
   



