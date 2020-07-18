<div class="col-md-7" style="margin: auto">
 
        <div class="card card-prirary cardutline direct-chat  direct-chat-primary ">
          <div class="card-header">
            <h3 class="card-title">Chat</h3>
          
            <div class="card-tools">
              <span data-toggle="tooltip" title="3 New Messages" class="badge bg-primary">3</span>
              <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
              </button>
              <button type="button" class="btn btn-tool" data-toggle="tooltip" title="Contacts" data-widget="chat-pane-toggle">
                <i class="fas fa-comments"></i></button>
            </div>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <!-- Conversations are loaded here -->
            @livewire('chat-list')
    
            <!-- Contacts are loaded here -->
            <div class="direct-chat-contacts">
              <ul class="contacts-list">
                <li>
                  <a href="#">
                    <img class="contacts-list-img" src="../dist/img/user1-128x128.jpg">
    
                    <div class="contacts-list-info">
                      <span class="contacts-list-name">
                        Count Dracula
                        <small class="contacts-list-date float-right">2/28/2015</small>
                      </span>
                      <span class="contacts-list-msg">12</span>
                    </div>
                    <!-- /.contacts-list-info -->
                  </a>
                </li>
                <!-- End Contact Item -->
              </ul>
              <!-- /.contatcts-list -->
            </div>
            <!-- /.direct-chat-pane -->
          </div>
          <!-- /.card-body -->
          <div class="card-footer">
         
              <div class="input-group">
                <input type="text"  placeholder="Type Message ..." wire:model="mensaje" class="form-control">
                <span class="input-group-append">
                  <button  wire:click="enviarMensaje" class="btn btn-primary enviar">Send</button>
                </span>
              </div>
    
          </div>
          <!-- /.card-footer-->
        </div>
      </aside>
</div>
