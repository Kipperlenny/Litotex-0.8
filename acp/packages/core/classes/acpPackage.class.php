<?php
/*
 * Copyright (c) 2010 Litotex
 * 
 * Permission is hereby granted, free of charge,
 * to any person obtaining a copy of this software and
 * associated documentation files (the "Software"),
 * to deal in the Software without restriction,
 * including without limitation the rights to use, copy,
 * modify, merge, publish, distribute, sublicense,
 * and/or sell copies of the Software, and to permit
 * persons to whom the Software is furnished to do so,
 * subject to the following conditions:
 * 
 * The above copyright notice and this permission notice
 * shall be included in all copies or substantial portions
 * of the Software.
 * 
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND,
 * EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES
 * OF MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND
 * NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT
 * HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY,
 * WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER
 * DEALINGS IN THE SOFTWARE.
 */
abstract class acpPackage extends package{
	public final function runtime(){
		if(!package::$user && $this->_packageName != 'acp_login'){
			header('Location: index.php?package=acp_login');
			exit();
		}
		if(package::$user && !package::$user->checkAcpLoginExpired())
			package::$user->revokeAcpLogin();
		if(package::$user && !package::$user->isAcpLogin() && $this->_packageName != 'acp_login'){
    		header('Location: index.php?package=acp_login');
    		exit();
    	}
    	if(package::$user)
    		package::$user->acpReLegit();
    	$this->runtimeAcp();
	}
	public function runtimeAcp(){}
}