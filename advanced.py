#
# INCOMPLETE CODE. CHECK Dan-advanced.php FOR THE COMPLETE CODE (IN PHP).
#

import datetime
import hashlib

class check_md5:

	def check_md5( self, given_md5 ):
		self.given_md5 = given_md5
		self.startTime = datetime.datetime.now()
		self.found = FALSE
		self.outputMsg = "Not found"
		self.numberOfChecks = 0L

		self.charDomain = "0123456789"
		self.numberOfChars = 4

		concatenateCharOrTry( self.numberOfChars )

	def concatenateCharOrTry( self, charsLeft, string="" ):
		if( self.found == TRUE ):
			return

		if( charsLeft == 0 ):
			string_md5 = hashlib.md5( string.encode('utf-8') ).hexdigest()
			if( string_md5 == self.given_md5 ):
				self.found = TRUE;
				self.outputMsg = string
			self.numberOfChecks += 1
			return

		i = 0
		while( self.found == FALSE and i < len(self.charDomain) ):
			char = self.charDomain[i]
			string = string + char
			concatenateCharOrTry( charsLeft - 1, string )
			if( self.found == TRUE ):
				break;
			i++