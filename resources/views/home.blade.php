@extends('userlayout')

    @section('content')
    <div class="row">
                <div class="col-sm-12">
              <section class="card">
              <header class="card-header">
                Service Centers in this Community
             <span class="tools pull-right">
                <a href="javascript:;" class="fa fa-chevron-down"></a>
                <a href="javascript:;" class="fa fa-times"></a>
             </span>
              </header>
              <div class="card-body">
              <div class="adv-table">
              <table  class="display table table-bordered table-striped" id="dynamic-table">
              <thead>
              <tr>
                  <th>Name</th>
                  <th>Phone</th>
                  <th>Address</th>
                  <th>Email</th>
                 
              </tr>
              </thead>
              <tbody>
             
     @foreach ($centers as $center)
        <tr class="gradeX">
            
            <td>{{ ucfirst($center->centername) }}</td>
            <td>{{ $center->cno }}</td>
            <td>{{ $center->address }}</td>
            <td>{{ $center->email }}</td>
        </tr>
        @endforeach
        
              
               </tbody>
              <tfoot>
              
              </tfoot>
              </table>
              </div>
              </div>
              </section>
              </div>
              </div>
              
              <!-- page end-->
   
    @endsection