<?php
/** Collection of objects
 */

class Collection implements \Iterator, \Countable
{
    protected $container = [];
    private $position = 0;
    private $keys = [];
    private $list = "";

    /** Adds an object inside the storage, and optionally associate it to some data.
     * @param object $key
     * @param null $data
     */
    public function add(object $key, $data = NULL)
    {
        if($data) {
            if(isset($this->container[$data])) {
                throw new Exception("Key \"$key\" is being used!");
            } else {
                $this->container[$data] = $key;
            }
        } else {
            $this->container[$this->getHash($key)] = $key;
        }
        $this->keys = $this->keys();
    }

    /** Removes the object from the storage.
     * @param object $key
     */
    public function remove(object $key)
    {
        if(isset($this->container[$this->getHash($key)])) {
            unset($this->container[$this->getHash($key)]);
        } else {
            throw new Exception("Invalid key \"$this->getHash($key)\"!");
        }
    }

    /** This method calculates an identifier for the objects.
     * @param object $object
     */
    public function getHash(object $object)
    {
            return spl_object_hash($object);
    }

    /** Get Iterator keys
     * @return array
     */
    public function keys()
    {
        return array_keys($this->container);
    }

    /** Get container item by it's key
     * @param $key
     * @return mixed
     * @throws Exception
     */
    public function getItem($key)
    {
        if(isset($this->container[$key])) {
            return $this->container[$key];
        } else {
            throw new Exception("Invalid key \"$key\"!");
        }
    }

    /** Return current iterator key (Should return last added object?)
     * @return object
     */
    public function current()
    {
        return $this->getItem($this->keys[$this->position]);
    }

    /** Return list of all added objects
     * @return string
     */
    public function getObjectList()
    {
        foreach($this->container as $key => $value) {
            $this->list .= "Object \"" . $key . "\" - " . get_class($value) . "\n";
        }
        return $this->list;
    }

    /** Function should return true if object exist in the collection, false - if not.
     * @param object $object
     */
    public function check(object $object)
    {
        return isset ($this->container[$this->getHash($object)]);
    }

    /**
     * @param $collection
     */
    public static function removeAll($collection)
    {
        unset($collection->container);
        unset($collection->keys);
        $collection->rewind();
    }

    /**
     * Move forward to next element
     * @link https://php.net/manual/en/iterator.next.php
     * @return void Any returned value is ignored.
     * @since 5.0.0
     */
    public function next()
    {
        ++$this->position;
    }

    /**
     * Return the key of the current element
     * @link https://php.net/manual/en/iterator.key.php
     * @return mixed scalar on success, or null on failure.
     * @since 5.0.0
     */
    public function key()
    {
        return $this->keys[$this->position];
    }

    /**
     * Checks if current position is valid
     * @link https://php.net/manual/en/iterator.valid.php
     * @return boolean The return value will be casted to boolean and then evaluated.
     * Returns true on success or false on failure.
     * @since 5.0.0
     */
    public function valid()
    {
        return isset ($this->keys[$this->position]);
    }

    /**
     * Rewind the Iterator to the first element
     * @link https://php.net/manual/en/iterator.rewind.php
     * @return void Any returned value is ignored.
     * @since 5.0.0
     */
    public function rewind()
    {
        $this->position = 0;
    }

    /**
     * Count elements of an object
     * @link https://php.net/manual/en/countable.count.php
     * @return int The custom count as an integer.
     * </p>
     * <p>
     * The return value is cast to an integer.
     * @since 5.1.0
     */
    public function count()
    {
        return count($this->container);
    }
}

?>