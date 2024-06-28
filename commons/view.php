<?php
class BaseView {
    public $title = '';
    public function requestComponents($name, $data = []) {
        global $route;
        global $viewApp;
        
        extract($data);
        $name = join(DIRECTORY_SEPARATOR, explode(".", $name));
        include(join(DIRECTORY_SEPARATOR, array('.', $route->isAdminPage ? 'admin' : 'clients', 'views', "components", "{$name}.php")));
    }
    public function requestViews($file,$name, $data = []) {
        global $route;
        global $viewApp;
        $data['title'] = $this->title;
        
        extract($data);
        $name = join(DIRECTORY_SEPARATOR, explode(".", $name));
        include(join(DIRECTORY_SEPARATOR, array('.', $route->isAdminPage ? 'admin' : 'clients','views', "layout", "header.php")));
        include(join(DIRECTORY_SEPARATOR, array('.', $route->isAdminPage ? 'admin' : 'clients','views',$file, "{$name}.php")));
        include(join(DIRECTORY_SEPARATOR, array('.', $route->isAdminPage ? 'admin' : 'clients','views', "layout", "footer.php")));
    }
    
    public function requestView($name, $data = []) {
        global $route;
        global $viewApp;
        $data['title'] = $this->title;
        
        extract($data);
        $name = join(DIRECTORY_SEPARATOR, explode(".", $name));
        include(join(DIRECTORY_SEPARATOR, array('.', $route->isAdminPage ? 'admin' : 'clients','views', "layout", "header.php")));
        include(join(DIRECTORY_SEPARATOR, array('.', $route->isAdminPage ? 'admin' : 'clients','views', "{$name}.php")));
        include(join(DIRECTORY_SEPARATOR, array('.', $route->isAdminPage ? 'admin' : 'clients','views', "layout", "footer.php")));
    }
}
