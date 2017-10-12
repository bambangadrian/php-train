<?php
function dump($var)
{
    echo '<pre>';
    var_dump($var);
    echo "\n";
    echo '</pre>';
}

interface HumanInterface
{

    const MALE_GENDER   = 'male';

    const FEMALE_GENDER = 'female';

    public function getName();

    public function getGender();

    public function getBirthDate();
}

abstract class AbstractHuman implements \HumanInterface
{

    private $Name;

    private $BirthDate;

    private $Gender;

    protected $Behave;

    private $SicknessPosibility;

    private $Illness;

    public function setName($name)
    {
        $this->Name = $name;
    }

    public function getName()
    {
        return $this->Name;
    }

    public function getGender()
    {
        return $this->Gender;
    }

    protected function setGender($gender)
    {
        if ($gender !== \HumanInterface::MALE_GENDER and $gender !== \HumanInterface::FEMALE_GENDER) {
            throw new \Exception('Invalid gender given');
        }
        $this->Gender = $gender;
    }

    protected function setBehave($behave)
    {
        $this->Behave = $behave;
    }

    protected function getBehave()
    {
        return $this->Behave;
    }

    public function getInfo()
    {
        $result = $this->getName() . ' is a ' . $this->getGender() . ' (' . $this->getBehave() . ')';
        $sickness = '';
        if (count($this->Illness) > 0) {
            $sickness = implode(', ', $this->Illness);
        }
        return $result . ' has sick: (' . $sickness . ')';
    }

    public function getBirthDate()
    {
        return $this->BirthDate;
    }

    public function setBirthDate($birthDate)
    {
        $this->BirthDate = $birthDate;
    }

    protected function setSicknessPosibility(array $sickness = [])
    {
        $this->SicknessPosibility = $sickness;
    }

    public function addIllness($illness)
    {
        $sicknessPosibility = $this->getSicknessPosibility();
        if (in_array($illness, $sicknessPosibility, true) === false) {
            throw new \Exception($illness . ' is not availble for ' . $this->getGender());
        }
        $this->Illness[] = $illness;
    }

    public function setIllnes(array $illness = [])
    {
        foreach ($illness as $ill) {
            $this->addIllness($ill);
        }
    }
}

class Male extends AbstractHuman
{

    public static $SicknessList = ['gonorhea'];

    public function __construct()
    {
        $this->setSicknessPosibility(self::$SicknessList);
        $this->setGender(\HumanInterface::MALE_GENDER);
        $this->setBehave('Crowdy');
    }

    public static function getSicknessPosibility()
    {
        return self::$SicknessList;
    }
}

class Female extends AbstractHuman
{

    public static $SicknessList = ['breast cancer'];

    public static function getSicknessPosibility()
    {
        return self::$SicknessList;
    }

    public function __construct()
    {
        $this->setSicknessPosibility(self::$SicknessList);
        $this->setGender(\HumanInterface::FEMALE_GENDER);
        $this->setBehave('Beauty Mindset');
    }
}

class EmployeeContract
{

    /**
     * @var \HumanInterface $Person
     */
    private $Person;

    private $ContractLength;

    private $Company;

    private $Position;

    /**
     * EmployeeContract constructor.
     *
     * @param \HumanInterface $person
     * @param  string         $company
     * @param  string         $position
     * @param string          $contractLength
     */
    public function __construct(\HumanInterface $person, $company, $position, $contractLength = '1 year')
    {
        $this->Person = $person;
        $this->Company = $company;
        $this->Position = $position;
        $this->ContractLength = $contractLength;
    }

    public function getInfo()
    {
        return $this->Person->getName() . ' (' . $this->Person->getGender() . ')  has contracted by ' . $this->Company .
            ' [' . $this->Position . ' - ' . $this->ContractLength . ']';
    }
}

try {
    $widi = new Male();
    $widi->setName('Widiyanto');
    $widi->addIllness('gonorhea');
    dump($widi->getInfo());
    # ----------
    $bambang = new Female();
    $bambang->setName('Bambang');
    dump($bambang->getInfo());
    $employeeContract = new \EmployeeContract($widi, 'invosa', 'server engineer');
    dump($employeeContract->getInfo());
    dump(\Male::getSicknessPosibility());
    dump(\Female::$SicknessList);
} catch (\Exception $ex) {
    dump($ex->getMessage());
}


