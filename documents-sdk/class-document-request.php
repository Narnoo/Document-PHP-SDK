<?php

class DocumentRequest extends Request {
	
    
    public function __construct($appkey,$secretkey,$endpoint){
        $this->setAuth($appkey, $secretkey);
        $this->endpoint = $endpoint;
    }

        /**
	 * get your all document information
	 *
         * @param INTEGER $Page_no The offset page results
	 * @return array
	 */
	public function getDocuments($page_no = 1) {
		return $this->getResponse ( 'documents', array ('page' => $page_no ) );
           
	}
        /**
	 * Get a collection of information
	 *
         * @param ARRAY Search Criteria Results
         *              @param INTEGER $Departments Department Identifier
         *              @param STRING $Category Document Category Names
         *              @param STRING $Keywords Document Keyword Names 
	 * @return array
	 */
        public function getCollection($params,$page_no = 1) {
                $page = array('page'=>$page_no);
                $var = array_merge($params,$page);
		return $this->getResponse ( 'collection', $var );           
	}
        /**
	 * Get a company departments
	 *
	 * @return array
	 */
        public function getDepartments() {
		return $this->getResponse ( 'departments' );
           
	}
        
        public function getCategories() {
		return $this->getResponse ( 'categories' );
           
	}
        
	
}

?>