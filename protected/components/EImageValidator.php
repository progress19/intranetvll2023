<?php
/**
 * Validates image file on upload.
 *
 * Validates it as a file, @see CFileValidator.
 * Defaults the file types to: jpg, png, gif, jpeg
 *
 * Added validation to the minimal image dimensions.
 *
 * @author Nikolay D.
 * @version 1.0
 */
class EImageValidator extends CFileValidator
{
    /** @var integer */
    public $minWidth = null;
   
    /** @var integer */
    public $minHeight = null;
   
    public $tooWide = 'El ancho de la Imagen Destacada no puede ser menor a {value} pixels.';
   
    public $tooTall = 'El alto de la Imagen Destacada no puede ser menor a {value} pixels.';
   
    public $types=array('jpg', 'jpeg', 'png', 'gif');
   
    public $wrongType = 'Pleas upload only files like: jpg, jpeg, gif, png!';
   
    /**
     * Internaly validates the image file object.
     *
     * @param CActiveRecord $object
     * @param string $attribute
     * @param CUploadedFile $file
     */
    protected function validateFile($object, $attribute, $file)
    {
        parent::validateFile($object, $attribute, $file);
        if( $object->hasErrors($attribute) )
            return;
       
        if( null === $this->minWidth && null === $this->minHeight )
            return;
       
        $this->minWidth = (int)$this->minWidth;
        $this->minHeight = (int)$this->minHeight;
       
        list($width, $height) = getimagesize($file->getTempName());
       
        if($this->minWidth > 0 && $this->minWidth > $width)
            $this->addError($object, $attribute, $this->tooWide, array(
                '{value}'=>$this->minWidth
            ));
       
        if( $this->minHeight > 0 && $this->minHeight > $height)
            $this->addError($object, $attribute, $this->tooTall, array(
                '{value}'=>$this->minHeight
            ));
    }
}
