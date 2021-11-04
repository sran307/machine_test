@extends("layout")
@section("title")
expense
@endsection
@section("content")
<section>
    <div id="admin-buttons">
        <button class="border-button" data-toggle="modal" data-target="#expense-modal">add expense</button>
        <a href="total_expense"><button class="border-button">total expense</button></a>
        <a href="/"><button class="border-button">Logout</button></a>
    </div>
    @if(session()->has("success_message"))
    <div class="alert alert-success">
        {{session()->get("success_message")}}
    </div>
    @endif
    @if(session()->has("error_message"))
    <div class="alert alert-danger">
        {{session()->get("error_message")}}
    </div>
    @endif
    <div class="modal fade" id="expense-modal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-dark">
                    <h5>expense</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body bg-dark">
                    <form action="/expense_form" method="post">
                    @csrf
                        <div class="row my-2">
                            <label for="date" class="col-form-label col-md-4">Expense date</label>
                            <div class="col-md-8">
                                <input type="date" name="date" placeholder="Expense Date" required class="form-control">
                            </div>
                        </div>
                        <div class="row my-2">
                            <label for="expense_reason" class="col-form-label col-md-4">Expense Reason</label>
                            <div class="col-md-8">
                                <input type="text" name="expense" placeholder="Enter the expense reason" required class="form-control ">
                            </div>
                        </div>
                        <div class="row my-2">
                            <label for="amount" class="col-form-label col-md-4">Expense Amount</label>
                            <div class="col-md-8">
                                <input type="text" name="amount" placeholder="Enter the amount of your expense"  class="form-control" required>
                            </div>
                        </div>
                        <div class="d-flex justify-content-center">
                            <button type="submit" class="btn btn-primary">Add Expense</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
</section>
@endsection